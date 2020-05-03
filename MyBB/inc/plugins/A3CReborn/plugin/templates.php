<?php

function A3CReborn_get_template($name) {
    global $db;

    $path = __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $name . '.html';
    $template = file_get_contents($path);
    return $db->escape_string($template);
}

// Template list
$A3CReborn_template_list = [
    // Gamer control panel page template
    'gamercp_page',
    // Cadre control panel page template
    'cadrecp_page',
    // Community memberlist page template
    'memberlist_page',
    // Community stats page template
    'stats_page',
    // Recruitment form page template
    'recruitment_form_page',
    // User profile page template
    'member_profile_page',
    // Recruitment forum application button template
    'forumdisplay_newrecruitmentapplication',
    // Postbit badge template
    'postbit_badge'
];

// Process template declarations
$A3CReborn_templates = array_map(function ($template_name) {
    return [
        'title' => 'a3creborn_'.$template_name,
        'template' => A3CReborn_get_template($template_name),
        'sid' => '-1',
        'version' => '',
        'dateline' => time()
    ];
}, $A3CReborn_template_list);

?>
