<?php

// Make sure we can't access this file directly from the browser.
if(!defined('IN_MYBB'))
{
	die('This file cannot be accessed directly.');
}

function A3CReborn_info()
{
    require_once(__DIR__ . '/A3CReborn/plugin/info.php');
    return $A3CReborn_info;
}

function A3CReborn_install()
{
    global $db, $mybb, $lang, $cache;

    // Require plugin data
    require_once __DIR__.'/A3CReborn/plugin/functions.php';
    require_once __DIR__.'/A3CReborn/plugin/settings.php';
    require_once __DIR__.'/A3CReborn/plugin/templates.php';

    // Create plugin tables
    create_plugin_tables();

    // Install theme and set as default
    install_plugin_theme();

    // Add plugin templates
    foreach ($A3CReborn_templates as $template) {
        $db->insert_query('templates', $template);
    }

    // Add settings
    $settings_group_id = $db->insert_query("settinggroups", $A3CReborn_settings_group);

    foreach ($A3CReborn_settings as $name => $setting) {
        $setting['name'] = $name;
        $setting['gid'] = $settings_group_id;

        $db->insert_query('settings', $setting);
    }

    // Force classic post display
    $db->update_query("users", ['classicpostbit' => 1]);

    // Setup mybb settings
    setup_mybb_settings();

    // Rebuild settings
    rebuild_settings();
}

function A3CReborn_is_installed()
{
    global $mybb;
    return isset($mybb->settings['a3creborn_recruitment_forum']);
}

function A3CReborn_uninstall()
{
    global $db, $mybb;

    // Require plugin data
    require_once __DIR__.'/A3CReborn/plugin/functions.php';
    require_once __DIR__.'/A3CReborn/plugin/settings.php';
    require_once __DIR__.'/A3CReborn/plugin/templates.php';


    // Check is this dev instance
    if (!$mybb->settings['a3creborn_is_dev_instance']) {
        flash_message('Nie możesz odinstalować pluginu w środowisku produkcyjnym', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    // Remove plugin tables
    remove_plugin_tables();

    // Remove theme
    remove_plugin_theme();

    // Remove plugin templates
    $plugin_templates_keys = implode(",", array_map(function ($template) {
        return "'{$template['title']}'";
    }, $A3CReborn_templates));

    $db->delete_query('templates', "title IN ($plugin_templates_keys)");

    // Remove settings
    $plugin_settings_keys = implode(",", array_map(function ($key) {
        return "'$key'";
    }, array_keys($A3CReborn_settings)));

    $db->delete_query('settings', "name IN ($plugin_settings_keys)");

    $settings_group_name = $A3CReborn_settings_group['name'];
    $db->delete_query('settinggroups', "name = '$settings_group_name'");

    // Rebuild settings
    rebuild_settings();
}

function A3CReborn_activate()
{

}

function A3CReborn_deactivate()
{

}

// Hooks delarations
require_once __DIR__.'/A3CReborn/plugin/hooks.php';
