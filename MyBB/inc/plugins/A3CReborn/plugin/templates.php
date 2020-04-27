<?php

function A3CReborn_get_template($name) {
    global $db;

    $path = __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $name . '.html';
    $template = file_get_contents($path);
    return $db->escape_string($template);
}

// Template list
$A3CReborn_templates = array(
    'a3creborn_forumdisplay_newrecruitmentapplication' => array(
        'template' => A3CReborn_get_template('forumdisplay_newrecruitmentapplication'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ),
    'a3creborn_recruitment_form_page' => array(
        'template' => A3CReborn_get_template('recruitment_form_page'),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    )
);

?>
