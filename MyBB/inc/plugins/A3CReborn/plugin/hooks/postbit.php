<?php

// inject user rank & badges into post
function A3CReborn_postbit($post) {
    global $db, $templates, $pids, $A3CReborn_userscache;

    // Missing users cache, build one
    if (!isset($A3CReborn_userscache)) {
        // Exit if no post ids delcared, probably not showthread
        if (!isset($pids) || $pids == '') return;

        $A3CReborn_userscache = [];
        $query = $db->query("
			SELECT uc.*
			FROM ".TABLE_PREFIX."posts p
			LEFT JOIN ".TABLE_PREFIX."a3creborn_userscache uc ON (uc.uid=p.uid)
			WHERE $pids
		");
        while($data = $db->fetch_array($query)) {
            if (!isset($A3CReborn_userscache[$data['uid']]))
                $A3CReborn_userscache[$data['uid']] = [];

            $A3CReborn_userscache[$data['uid']][$data['type']] = $data['cache'];
        }
    }

    if (!isset($A3CReborn_userscache[$post['uid']]))
        $A3CReborn_userscache[$post['uid']] = [];

    // Missing badges cache for user, build one
    if (!isset($A3CReborn_userscache[$post['uid']]['badges'])) {
        // TODO: add data source
        $user_assigned_badges = [
            [
                'name' => 'test',
                'icon' => 'https://www.arma3coop.pl/img/baretki/podst/1.png'
            ]
        ];

        $user_badges = '';
        foreach ($user_assigned_badges as $badge) {
            eval("\$badge_html = \"".$templates->get("a3creborn_postbit_badge")."\";");
            $user_badges .= $badge_html;
            $badge_html = '';
        }

        $A3CReborn_userscache[$post['uid']]['badges'] = $user_badges;
        $db->insert_query('a3creborn_userscache', [
            'uid' => $post['uid'],
            'type' => 'badges',
            'cache' => $user_badges
        ]);
    }

    $post['a3creborn_badges'] = $A3CReborn_userscache[$post['uid']]['badges'];

    return $post;
}

?>
