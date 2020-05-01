<?php

// hook: global_start
// include plugin version in all templates
$plugins->add_hook("global_start", "A3CReborn_global_start");
function A3CReborn_global_start() {
    global $A3CReborn_version;

    require_once __DIR__ . '/info.php';
    $A3CReborn_version = $A3CReborn_info['version'];
}

// hook: newthread_start
// replace new thread buttons in recruitment forum
$plugins->add_hook("newthread_start", "A3CReborn_newthread_start");
function A3CReborn_forumdisplay_threadlist() {
    global $mybb, $templates, $newthread, $fid;

    // Exit if not recruitment forum
    if ($fid !== (int)$mybb->settings['a3creborn_recruitment_forum']) return;

    eval("\$newthread = \"".$templates->get("a3creborn_forumdisplay_newrecruitmentapplication")."\";");
}

// hook: forumdisplay_threadlist
// replace new thread form with recruitment form in recruitment forum
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

// hook: postbit
// include plugin data in posts
$plugins->add_hook("postbit", "A3CReborn_postbit");
require_once __DIR__ . '/hooks/postbit.php';


// $plugins->add_hook("admin_page_output_nav_tabs_start", "A3CReborn_admin_page_output_nav_tabs_start");
// $plugins->add_hook("admin_config_plugins_begin", "A3CReborn_admin_config_plugins_begin");
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


?>
