<?php

// Make sure we can't access this file directly from the browser.
if(!defined('IN_MYBB'))
{
	die('This file cannot be accessed directly.');
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'A3CReborn' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'global.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'A3CReborn' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'autoload.php';

function A3CReborn_info()
{
	/**
	 * Array of information about the plugin.
	 * name: The name of the plugin
	 * description: Description of what the plugin does
	 * website: The website the plugin is maintained at (Optional)
	 * author: The name of the author of the plugin
	 * authorsite: The URL to the website of the author (Optional)
	 * version: The version number of the plugin
	 * compatibility: A CSV list of MyBB versions supported. Ex, '121,123', '12*'. Wildcards supported.
	 * codename: An unique code name to be used by updated from the official MyBB Mods community.
	 */
	return PLUGIN_INFO;
}

function A3CReborn_install()
{
    global $db;
    (new \A3C\Mission\Repositories\SlotTypeRepository($db))->createTable();
    (new \A3C\Decoration\Repositories\DecorationRepository($db))->createTable();
}

function A3CReborn_is_installed()
{
    global $db;
    return (
        (new \A3C\Mission\Repositories\SlotTypeRepository($db))->tableExists()
        && (new \A3C\Decoration\Repositories\DecorationRepository($db))->tableExists()
    );
}

function A3CReborn_uninstall()
{
    global $mybb, $db;

    // Check is this dev instance
    // For development you can go to
    // Admin CP / Configuration / Settings / Add new setting
    // and add Yes / No setting with is_dev_env identifier
    if (!isset($mybb->settings['is_dev_env']) || !$mybb->settings['is_dev_env']) {
        flash_message('Nie możesz odinstalować pluginu w środowisku produkcyjnym', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    (new \A3C\Mission\Repositories\SlotTypeRepository($db))->dropTable();
    (new \A3C\Decoration\Repositories\DecorationRepository($db))->dropTable();
}

function A3CReborn_activate()
{

}

function A3CReborn_deactivate()
{

}

// Hooks delarations
$plugins->add_hook("admin_page_output_nav_tabs_start", "A3CReborn_admin_page_output_nav_tabs_start");
$plugins->add_hook("admin_config_plugins_begin", "A3CReborn_admin_config_plugins_begin");

// Hooks functions
function A3CReborn_admin_page_output_nav_tabs_start($tabs) {
    global $page;

    // Exit if not plugins config
    if ($page->active_module != 'config' || $page->active_action != 'plugins') return $tabs;

    // Check is update needed
    // TODO

    // Update needed, add tab;
    $tabs['update_a3creborn'] = array(
    	'title' => 'Aktualizuj A3CReborn',
    	'link' => "index.php?module=config-plugins&amp;action=update_a3creborn",
    	'description' => 'Wykonaj potrzebne aktualizacje A3CReborn takie jak aktualizacje tabel itp.'
    );

    return $tabs;
}

function A3CReborn_admin_config_plugins_begin() {
    global $mybb, $lang, $page;

    // Exit if not our update action
    if ($mybb->input['action'] != 'update_a3creborn') return;

    // Check if update needed
    // TODO

    // Perform update
    // TODO

    // Show confirmation
    flash_message('Aktualizacja przebiegła pomyślnie', 'success');
    admin_redirect("index.php?module=config-plugins");
}
