<?php
/**
 * Community memberlist
 */

define("IN_MYBB", 1);
define('THIS_SCRIPT', 'stats.php');

require_once (__DIR__.'/../../../global.php');

// Add a breadcrumb
add_breadcrumb('Statystyki społeczności', "stats.php");

// Process page
eval('$page  = "' . $templates->get('a3creborn_stats_page') . '";');
output_page($page);
