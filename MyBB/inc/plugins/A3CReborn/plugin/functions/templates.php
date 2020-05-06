<?php

// Checks is given plugin template installed
function plugin_template_exists($template_name) {
    global $db;

    $query = $db->simple_select('templates', 'title', "title='a3creborn_{$template_name}'");
    $template = $db->fetch_field($query, 'title');

    return !!$template;
}

// Returns given plugin template file contents
function get_plugin_template_file_contents($template_name) {
    $path = A3CREBORN_PLUGIN_ROOT."/templates/{$template_name}.html";
    $contents = file_get_contents($path);

    return $contents;
}

// Updates given plugin template
function update_plugin_template($template_name) {
    global $db;

    $contents = get_plugin_template_file_contents($template_name);

    $db->update_query('templates', [
        'template' => $db->escape_string($contents)
    ], "title = 'a3creborn_${$template_name}'");
}

// Adds given plugin template
function add_plugin_template($template_name) {
    global $db;

    $contents = get_plugin_template_file_contents($template_name);

    $db->insert_query('templates', [
        'title' => 'a3creborn_'.$template_name,
        'template' => $db->escape_string($contents),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ]);
}

// Adds plugin templates
function install_plugin_templates() {
    global $db;

    $template_files = require A3CREBORN_PLUGIN_ROOT.'/templates.php';

    foreach ($template_files as $template_name) {
        add_plugin_template($template_name);
    }
}

// Update plugin templates and adds missing ones
function update_plugin_templates() {
    $template_files = require A3CREBORN_PLUGIN_ROOT.'/templates.php';

    foreach ($template_files as $template_name) {
        if (plugin_template_exists($template_name)) {
            update_plugin_template($template_name);
        } else {
            add_plugin_template($template_name);
        }
    }
}

// Removes plugin templates
function remove_plugin_templates() {
    global $db;

    $template_files = require A3CREBORN_PLUGIN_ROOT.'/templates.php';

    $plugin_templates_keys = implode(",", array_map(function ($template_name) {
        return "'a3creborn_{$template_name}'";
    }, $template_files));

    $db->delete_query('templates', "title IN ($plugin_templates_keys)");
}

// Checks are plugin templates ready to be installed
function plugin_templates_ready() {
    $template_files = require A3CREBORN_PLUGIN_ROOT.'/templates.php';

    foreach ($template_files as $file) {
        if (!file_exists(A3CREBORN_PLUGIN_ROOT."/templates/{$file}.html")) {
            return false;
        }
    }

    return true;
}
