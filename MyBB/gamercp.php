<?php

define("IN_MYBB", 1);

require_once "./global.php";
require_once (__DIR__ . DIRECTORY_SEPARATOR .  'inc' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'A3CReborn' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'autoload.php');

use A3C\Application;

$application = new Application($mybb);
return $application->dispatchRequest();
