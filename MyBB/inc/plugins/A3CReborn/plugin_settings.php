<?php

$A3CReborn_settings_group = array(
    'name' => 'a3crebornsettings',
    'title' => 'A3C Reborn Settings',
    'description' => 'Ustawienia A3C Reborn',
    'disporder' => 5,
    'isdefault' => 0
);

$A3CReborn_settings = array(
    'is_dev_instance' => array(
        'title' => 'Instancja developerska?',
        'description' => 'Czy jest to forum developerskie?',
        'optionscode' => 'yesno',
        'value' => 0,
        'disporder' => 1
    ),
    'recruitment_forum' => array(
        'title' => 'Dział rekrutacji',
        'description' => 'Dział w którym rekruci składają podania do grupy',
        'optionscode' => 'forumselectsingle',
        'value' => null,
        'disporder' => 2
    )
);

?>
