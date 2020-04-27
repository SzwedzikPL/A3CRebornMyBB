<?php

// Settings group
$A3CReborn_settings_group = array(
    'name' => 'a3creborn_settings',
    'title' => 'Ustawienia A3C Reborn',
    'description' => 'Ustawienia pluginu A3C Reborn',
    'disporder' => 5,
    'isdefault' => 0
);

// Settings list
$A3CReborn_settings = array(
    'a3creborn_is_dev_instance' => array(
        'title' => 'Instancja developerska?',
        'description' => 'Czy jest to forum developerskie?',
        'optionscode' => 'yesno',
        'value' => 0,
        'disporder' => 1
    ),
    'a3creborn_recruitment_forum' => array(
        'title' => 'Dział rekrutacji',
        'description' => 'Dział w którym rekruci składają podania do grupy',
        'optionscode' => 'forumselectsingle',
        'value' => null,
        'disporder' => 2
    )
);

?>
