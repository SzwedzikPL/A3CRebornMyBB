<?php

function get_mybb_config() {

    $settings = [];
    require_once __DIR__.'/../../../../settings.php';

    return [
        'url_prefix' => str_replace($settings['homeurl'], '', $settings['bburl'])
    ];
}

return get_mybb_config();

?>
