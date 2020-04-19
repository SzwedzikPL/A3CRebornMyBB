<?php

spl_autoload_register(function($className) {
    str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = ltrim($className, 'A3C');
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});
