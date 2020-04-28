<?php

function A3CReborn_get_template($name) {
    global $db;

    $path = __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $name . '.html';
    $template = file_get_contents($path);
    return $db->escape_string($template);
}

// Template list
$A3CReborn_templates = [
    'a3creborn_gamercp_page' => [
        'template' => A3CReborn_get_template('gamercp_page'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ],
    'a3creborn_cadrecp_page' => [
        'template' => A3CReborn_get_template('cadrecp_page'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ],
    'a3creborn_recruitment_form_page' => [
        'template' => A3CReborn_get_template('recruitment_form_page'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ],
    'a3creborn_member_profile' => [
        'template' => A3CReborn_get_template('member_profile'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ],
    'a3creborn_forumdisplay_newrecruitmentapplication' => [
        'template' => A3CReborn_get_template('forumdisplay_newrecruitmentapplication'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ],
];

?>
