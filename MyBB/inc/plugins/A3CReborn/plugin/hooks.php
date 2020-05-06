<?php

// global_start
// includes plugin version in global vars for templates
$plugins->add_hook("global_start", "A3CReborn_global_start");
function A3CReborn_global_start() {
    global $A3CReborn_version;

    $info = require_once A3CREBORN_PLUGIN_ROOT.'/info.php';
    $A3CReborn_version = $info['version'];
}

// newthread_start
// replaces new thread buttons in recruitment forum
$plugins->add_hook("newthread_start", "A3CReborn_newthread_start");
function A3CReborn_forumdisplay_threadlist() {
    global $mybb, $templates, $newthread, $fid;

    // Exit if not recruitment forum
    if ($fid !== (int)$mybb->settings['a3creborn_recruitment_forum']) return;

    eval("\$newthread = \"".$templates->get("a3creborn_forumdisplay_newrecruitmentapplication")."\";");
}

// forumdisplay_threadlist
// replaces new thread form with recruitment form in recruitment forum
$plugins->add_hook("forumdisplay_threadlist", "A3CReborn_forumdisplay_threadlist");
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

// postbit
// includes plugin data in posts
require_once A3CREBORN_PLUGIN_ROOT.'/hooks/postbit.php';

// admin_page_output_nav_tabs_start
// Adds update plugin button if needed
$plugins->add_hook("admin_page_output_nav_tabs_start", "A3CReborn_admin_page_output_nav_tabs_start");
function A3CReborn_admin_page_output_nav_tabs_start($tabs) {
    global $page;

    // Exit if not plugins config
    if ($page->active_module != 'config' || $page->active_action != 'plugins') return $tabs;

    require A3CREBORN_PLUGIN_ROOT.'/functions.php';

    // Check is update needed
    if (!is_plugin_update_needed()) return $tabs;

    // Update needed, add tab;
    $tabs['update_a3creborn'] = array(
    	'title' => 'Aktualizuj A3CReborn',
    	'link' => "index.php?module=config-plugins&amp;action=update_a3creborn",
    	'description' => 'Aktualizuj plugin A3CReborn'
    );

    return $tabs;
}

// admin_config_plugins_begin
// Handles plugin update action
$plugins->add_hook("admin_config_plugins_begin", "A3CReborn_admin_config_plugins_begin");
function A3CReborn_admin_config_plugins_begin() {
    global $mybb;

    // Exit if not our update action
    if ($mybb->input['action'] != 'update_a3creborn') return;

    require A3CREBORN_PLUGIN_ROOT.'/functions.php';

    // Check if update needed
    if (!is_plugin_update_needed()) return;

    // Check if plugin templates ready
    if (!plugin_templates_ready()) {
        flash_message('Szablony pluginu nie zostały przygotowane. Zbuduj webapkę zanim zaktualizujesz plugin.', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    // Perform update
    update_plugin();

    // Show confirmation
    flash_message('Aktualizacja przebiegła pomyślnie', 'success');
    admin_redirect("index.php?module=config-plugins");
}
