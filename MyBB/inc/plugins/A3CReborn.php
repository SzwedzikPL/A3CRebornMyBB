<?php

// Make sure we can't access this file directly from the browser.
if(!defined('IN_MYBB')) {
	die('This file cannot be accessed directly.');
}

define('A3CREBORN_PLUGIN_ROOT', __DIR__.'/A3CReborn/plugin');

function A3CReborn_info() {
    $info = require A3CREBORN_PLUGIN_ROOT.'/info.php';
    return $info;
}

function A3CReborn_install() {
    // Require plugin functions
    require A3CREBORN_PLUGIN_ROOT.'/functions.php';

    // Check if plugin templates ready
    if (!plugin_templates_ready()) {
        flash_message('Szablony pluginu nie zostały przygotowane. Zbuduj webapkę zanim zainstalujesz plugin.', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    // Install plugin
    install_plugin();
}

function A3CReborn_is_installed() {
    global $mybb;
    return isset($mybb->settings['a3creborn_recruitment_forum']);
}

function A3CReborn_uninstall() {
    global $db, $mybb;

    // Require plugin functions
    require A3CREBORN_PLUGIN_ROOT.'/functions.php';

    // Check is this dev instance
    if (!is_dev_instance() && !$mybb->settings['a3creborn_is_dev_instance']) {
        flash_message('Nie możesz odinstalować pluginu w środowisku produkcyjnym', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    // Uninstall plugin
    uninstall_plugin();
}

function A3CReborn_activate() {
    // Not supported
}

function A3CReborn_deactivate() {
    // Not supported
}

// Hooks delarations
require_once A3CREBORN_PLUGIN_ROOT.'/hooks.php';
