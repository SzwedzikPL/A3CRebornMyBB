<?php

function is_dev_instance() {
    global $mybb;

    if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) return true;
    return isset($mybb->settings['a3creborn_is_dev_instance']) && $mybb->settings['a3creborn_is_dev_instance'];
}

require_once __DIR__.'/functions/settings.php';
require_once __DIR__.'/functions/tables.php';
require_once __DIR__.'/functions/templates.php';
require_once __DIR__.'/functions/theme.php';
require_once __DIR__.'/functions/plugin.php';
