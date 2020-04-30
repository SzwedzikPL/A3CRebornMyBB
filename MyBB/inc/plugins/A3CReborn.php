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

    // Install theme and set as default
    install_plugin_theme();

    // Create tables
    // TODO

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

    // Remove theme
    remove_plugin_theme();

    // Remove tables
    // TODO

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
$plugins->add_hook("global_start", "A3CReborn_global_start");
$plugins->add_hook("newthread_start", "A3CReborn_newthread_start");
$plugins->add_hook("forumdisplay_threadlist", "A3CReborn_forumdisplay_threadlist");
$plugins->add_hook("postbit", "A3CReborn_postbit");
// $plugins->add_hook("admin_page_output_nav_tabs_start", "A3CReborn_admin_page_output_nav_tabs_start");
// $plugins->add_hook("admin_config_plugins_begin", "A3CReborn_admin_config_plugins_begin");

function A3CReborn_global_start() {
    global $A3CReborn_version;

    require_once(__DIR__ . '/A3CReborn/plugin/info.php');
    $A3CReborn_version = $A3CReborn_info['version'];
}

// Hooks functions
function A3CReborn_forumdisplay_threadlist() {
    global $mybb, $templates, $newthread, $fid;

    // Exit if not recruitment forum
    if ($fid !== (int)$mybb->settings['a3creborn_recruitment_forum']) return;

    eval("\$newthread = \"".$templates->get("a3creborn_forumdisplay_newrecruitmentapplication")."\";");
}

function A3CReborn_newthread_start() {
    global $mybb, $templates, $lang, $header, $headerinclude, $footer, $fid;

    // Exit if not recruitment forum
    if ($fid !== (int)$mybb->settings['a3creborn_recruitment_forum']) return;

    // Add a breadcrumb
    add_breadcrumb('Podanie rekrutacyjne', "");

    // Evaluate template
    eval("\$page = \"".$templates->get("a3creborn_recruitment_form_page")."\";");

    output_page($page);
    exit();
}

function A3CReborn_postbit($post) {
    // inject user rank & badges into post

    return $post;
}


// function A3CReborn_admin_page_output_nav_tabs_start($tabs) {
//     global $page;
//
//     // Exit if not plugins config
//     if ($page->active_module != 'config' || $page->active_action != 'plugins') return $tabs;
//
//     // Check is update needed
//     // TODO
//
//     // Update needed, add tab;
//     $tabs['update_a3creborn'] = array(
//     	'title' => 'Aktualizuj A3CReborn',
//     	'link' => "index.php?module=config-plugins&amp;action=update_a3creborn",
//     	'description' => 'Wykonaj potrzebne aktualizacje A3CReborn takie jak aktualizacje tabel itp.'
//     );
//
//     return $tabs;
// }
//
// function A3CReborn_admin_config_plugins_begin() {
//     global $mybb, $lang, $page;
//
//     // Exit if not our update action
//     if ($mybb->input['action'] != 'update_a3creborn') return;
//
//     // Check if update needed
//     // TODO
//
//     // Perform update
//     // TODO
//
//     // Show confirmation
//     flash_message('Aktualizacja przebiegła pomyślnie', 'success');
//     admin_redirect("index.php?module=config-plugins");
// }
