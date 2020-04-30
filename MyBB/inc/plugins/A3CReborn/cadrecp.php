<?php
/**
 * Cadre control panel
 */

define("IN_MYBB", 1);
define('THIS_SCRIPT', 'cadrecp.php');

require_once (__DIR__.'/../../../global.php');

// Add a breadcrumb
add_breadcrumb('Panel kadry', "cadrecp.php");

// Process page
eval('$page  = "' . $templates->get('a3creborn_cadrecp_page') . '";');
output_page($page);
