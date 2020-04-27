<?php

function get_board() {
    require_once __DIR__.'/../../../../global.php';

    return [
        'board' => $mybb,
        'db' => $db,
        'lang' => $lang
    ];
}

?>
