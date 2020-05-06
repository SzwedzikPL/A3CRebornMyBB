<?php

function is_dev_instance() {
    return (int)in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
}

require_once __DIR__.'/functions/settings.php';
require_once __DIR__.'/functions/tables.php';
require_once __DIR__.'/functions/templates.php';
require_once __DIR__.'/functions/theme.php';
require_once __DIR__.'/functions/plugin.php';
