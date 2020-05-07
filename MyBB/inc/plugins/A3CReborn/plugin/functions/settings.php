<?php

// Adds plugin settings
function add_plugin_settings() {
    global $db;

    $settings = require A3CREBORN_PLUGIN_ROOT.'/settings.php';

    $group_id = $db->insert_query("settinggroups", $settings['group']);

    foreach ($settings['list'] as $name => $setting) {
        $setting['name'] = $name;
        $setting['gid'] = $group_id;

        $db->insert_query('settings', $setting);
    }
}

// Adds missing settings
function update_plugin_settings() {
    global $db;

    $settings = require A3CREBORN_PLUGIN_ROOT.'/settings.php';

    // Get group id
    $query = $db->simple_select('settinggroups', 'gid', "name='{$settings['group']['name']}'");
    $group_id = $db->fetch_field($query, 'gid');

    // Get current settings
    $currentSettings = [];
    $query = $db->simple_select('settings', 'name', "gid={$group_id}");
    while($setting = $db->fetch_array($query)) {
        $currentSettings[$setting['name']] = true;
    }

    // Add missing settings
    foreach ($settings['list'] as $name => $setting) {
        if (isset($currentSettings[$name])) continue;

        $setting['name'] = $name;
        $setting['gid'] = $group_id;

        $db->insert_query('settings', $setting);
    }
}

// Removes plugin settings
function remove_plugin_settings() {
    global $db;

    $settings = require A3CREBORN_PLUGIN_ROOT.'/settings.php';

    $plugin_settings_keys = implode(",", array_map(function ($key) {
        return "'$key'";
    }, array_keys($settings['list'])));

    $db->delete_query('settings', "name IN ($plugin_settings_keys)");

    $settings_group_name = $settings['group']['name'];
    $db->delete_query('settinggroups', "name = '$settings_group_name'");
}

// Setup mybb settings for A3C board
function setup_mybb_settings() {
    global $db;

    $mybb_settings = require A3CREBORN_PLUGIN_ROOT.'/mybb/settings.php';

    foreach ($mybb_settings as $setting => $value) {
        $db->update_query("settings", ['value' => $value], "name='".$setting."'");
    }
}

// Updates mybb settings
function update_mybb_settings() {
    global $db;

    $mybb_settings = require A3CREBORN_PLUGIN_ROOT.'/mybb/settings.php';
    $settings = ['useravatar'];

    foreach ($settings as $setting) {
        $db->update_query("settings", ['value' => $mybb_settings[$setting]], "name='".$setting."'");
    }
}
