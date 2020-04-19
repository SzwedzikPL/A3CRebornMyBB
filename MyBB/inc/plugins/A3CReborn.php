<?php

// Make sure we can't access this file directly from the browser.
if(!defined('IN_MYBB'))
{
	die('This file cannot be accessed directly.');
}

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
	return array(
		'name'			=> 'A3CReborn',
		'description'	=> '',
		'website'		=> 'https://arma3coop.pl',
		'author'		=> 'Arma3Coop.pl',
		'authorsite'	=> 'https://github.com/SzwedzikPL/A3CRebornMyBB',
		'version'		=> '0.0.1',
		'compatibility'	=> '18*',
		'codename'		=> ''
	);
}

function A3CReborn_install()
{

}

function A3CReborn_is_installed()
{

}

function A3CReborn_uninstall()
{

}

function A3CReborn_activate()
{

}

function myplugin_deactivate()
{

}