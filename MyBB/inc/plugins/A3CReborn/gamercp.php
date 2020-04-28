<?php
/**
 * Gamer control panel
 */

define("IN_MYBB", 1);
define('THIS_SCRIPT', 'gamercp.php');

require_once ('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .  'global.php');

// Add a breadcrumb
add_breadcrumb('Panel gracza', "gamercp.php");

// Process page
eval('$page  = "' . $templates->get('a3creborn_gamercp_page') . '";');
output_page($page);
