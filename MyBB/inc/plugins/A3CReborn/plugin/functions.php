<?php

// Setup mybb settings for A3C board
function setup_mybb_settings() {
    global $db;

    $mybb_settings = [

    ];

    foreach ($mybb_settings as $setting => $value) {
        $db->update_query("settings", ['value' => $value], "name='".$setting."'");
    }
}

// Install A3CReborn theme & set it as default for all users
function install_plugin_theme() {
    global $db, $mybb, $lang, $cache;

    require_once __DIR__."/../../../../admin/inc/functions_themes.php";

    $theme_contents = @file_get_contents(__DIR__.'/theme/theme.xml');

    if (!trim($theme_contents)) {
        flash_message('Błąd odczytu pliku szablonu', 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    $theme_options = array(
        'no_stylesheets' => 0,
        'no_templates' => 0,
        'version_compat' => 0,
        'parent' => 1,
        'force_name_check' => true,
    );
    $theme_id = import_theme_xml($theme_contents, $theme_options);

    if ($theme_id < 0) {
        $theme_import_error = 'Błąd importu szablonu. ';
        switch($theme_id) {
            case -1:
                $theme_import_error .= $lang->error_uploadfailed_nocontents;
                break;
            case -2:
                $theme_import_error .= $lang->error_invalid_version;
                break;
            case -3:
                $theme_import_error .= $lang->error_theme_already_exists;
                break;
            case -4:
                $theme_import_error .= $lang->error_theme_security_problem;
                break;
            default:
                $theme_import_error .= 'Błąd '.$theme_id.'.';
                break;
        }

        flash_message($theme_import_error, 'error');
        admin_redirect("index.php?module=config-plugins");
        return;
    }

    // Set theme as default
    $theme_query = $db->simple_select("themes", "*", "tid='".$theme_id."'");
	$theme = $db->fetch_array($theme_query);

    $cache->update('default_theme', $theme);

	$db->update_query("themes", array('def' => 0));
	$db->update_query("themes", array('def' => 1), "tid='".$theme_id."'");

    // Set theme for existing users
    $updated_users = ["style" => $theme_id];
    $db->update_query("users", $updated_users);
}

// Remove A3CReborn theme
function remove_plugin_theme() {
    global $db, $mybb, $lang, $cache;

    require_once __DIR__."/../../../../admin/inc/functions_themes.php";

    $query = $db->simple_select("themes", "*", "name='A3CReborn'");
    $theme = $db->fetch_array($query);

    if (!$theme['tid'] || $theme['tid'] == 1) return;

    $tbits = my_unserialize($theme['properties']);
    $theme_templateset = $tbits['templateset'];

	$inherited_theme_cache = array();

	$query = $db->simple_select("themes", "tid,stylesheets", "tid != '{$theme['tid']}'", array('order_by' => "pid, name"));
	while ($theme2 = $db->fetch_array($query)) {
        $theme2['stylesheets'] = my_unserialize($theme2['stylesheets']);

		if (!$theme2['stylesheets']['inherited']) {
			continue;
		}

		$inherited_theme_cache[$theme2['tid']] = $theme2['stylesheets']['inherited'];
	}

	$inherited_stylesheets = false;

	// Are any other themes relying on stylesheets from this theme?
	foreach($inherited_theme_cache as $tid => $inherited) {
		foreach($inherited as $file => $value) {
			foreach($value as $filepath => $val) {
				if(strpos($filepath, "cache/themes/theme{$theme['tid']}") !== false) {
					$inherited_stylesheets = true;
				}
			}
		}
	}

    // Exit if there are
	if ($inherited_stylesheets) return;

    // Remove theme cache
	$query = $db->simple_select("themestylesheets", "cachefile", "tid='{$theme['tid']}'");
	while($cachefile = $db->fetch_array($query)) {
		@unlink(MYBB_ROOT."cache/themes/theme{$theme['tid']}/{$cachefile['cachefile']}");

		$filename_min = str_replace('.css', '.min.css', $cachefile['cachefile']);
		@unlink(MYBB_ROOT."cache/themes/theme{$theme['tid']}/{$filename_min}");
	}
	@unlink(MYBB_ROOT."cache/themes/theme{$theme['tid']}/index.html");

	$db->delete_query("themestylesheets", "tid='{$theme['tid']}'");

	// Update the CSS file list for this theme
	update_theme_stylesheet_list($theme['tid'], $theme, true);

	$db->update_query("users", array('style' => 0), "style='{$theme['tid']}'");

    // Remove theme cache
	@rmdir(MYBB_ROOT."cache/themes/theme{$theme['tid']}/");

    // Update parent of theme children
	$children = (array)make_child_theme_list($theme['tid']);
	$child_tids = array();

	foreach ($children as $child_tid) {
		if ($child_tid != 0) {
			$child_tids[] = $child_tid;
		}
	}

	if(!empty($child_tids)) {
		$db->update_query("themes", array('pid' => $theme['pid']), "tid IN (".implode(',', $child_tids).")");
	}

    // Remove theme
	$db->delete_query("themes", "tid='{$theme['tid']}'", 1);

    // Remove theme template set
    // Get used template sets
    $used_sets = [];
	$query = $db->simple_select("themes", "properties");
	while ($theme = $db->fetch_array($query)) {
		$properties = my_unserialize($theme['properties']);
        $user_sets[] = $properties['templateset'];
	}

    if (!in_array($theme_templateset, $used_sets)) {
        // Delete the templateset
        $db->delete_query("templatesets", "sid='{$theme_templateset}'");

        // Delete all custom templates in this templateset
        $db->delete_query("templates", "sid='{$theme_templateset}'");
    };
}

?>
