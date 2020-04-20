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
    global $db;
    (new \A3C\Mission\Repositories\SlotTypeRepository($db))->dropTable();
    (new \A3C\Decoration\Repositories\DecorationRepository($db))->dropTable();
}

function A3CReborn_activate()
{

}

function A3CReborn_deactivate()
{

}
