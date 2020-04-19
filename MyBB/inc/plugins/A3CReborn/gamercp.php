<?php
/**
 * Gamer control panel
 */

define("IN_MYBB", 1);

require_once ('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .  'global.php');
require_once ('app' . DIRECTORY_SEPARATOR . 'autoload.php');

use A3C\Application;

$application = new Application($mybb);
echo $application->dispatchRequest();
exit;
