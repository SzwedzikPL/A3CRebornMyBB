<?php
/**
 * Community memberlist
 */

define("IN_MYBB", 1);
define('THIS_SCRIPT', 'memberlist.php');

require_once (__DIR__.'/../../../global.php');

// Add a breadcrumb
add_breadcrumb('Członkowie społeczności', "memberlist.php");

// Process page
eval('$page  = "' . $templates->get('a3creborn_memberlist_page') . '";');
output_page($page);
