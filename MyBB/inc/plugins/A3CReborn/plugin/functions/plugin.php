<?php

// Updates plugin version in db
function set_plugin_version($isUpdate = false) {
    global $db;

    $info = require A3CREBORN_PLUGIN_ROOT.'/info.php';

    if ($isUpdate) {
        $db->update_query("a3creborn", ['value' => $info['version']], "variable='version'");
    } else {
        $db->insert_query("a3creborn", [
            'variable' => 'version',
            'value' => $info['version']
        ]);
    }
}

// Returns true if plugin update is needed
function is_plugin_update_needed() {
    global $db;

    // Always allow updates in dev
    if (is_dev_instance()) return true;

    // Get current version
    $query = $db->simple_select('a3creborn', 'value', "variable='version'");
    $currentVersion = $db->fetch_field($query, 'value');

    // Compare
    $info = require A3CREBORN_PLUGIN_ROOT.'/info.php';
    return $info['version'] !== $currentVersion;
}

// Installs plugin
function install_plugin() {
    global $db;

    // Create plugin tables
    create_plugin_tables();

    // Install plugin theme and set it as default
    install_plugin_theme();

    // Install plugin templates
    install_plugin_templates();

    // Add plugin settings
    add_plugin_settings();

    // Force classic post display on all users
    $db->update_query("users", ['classicpostbit' => 1]);

    // Setup mybb settings
    setup_mybb_settings();

    // Set plugin version
    set_plugin_version();

    // Rebuild settings
    rebuild_settings();
}

// Updates plugin
function update_plugin() {
    // Reinstall theme
    remove_plugin_theme();
    install_plugin_theme();

    // Update templates
    update_plugin_templates();

    // Update settings
    update_plugin_settings();

    // Update plugin version
    set_plugin_version(true);

    // Rebuild settings
    rebuild_settings();
}

// Returns true if plugin is installed
function is_plugin_installed() {
    global $db;

    if (!$db->table_exists('a3creborn')) return false;
    return $db->field_exists('version', 'a3creborn');
}

// Uninstalls plugin
function uninstall_plugin() {
    // Remove plugin tables
    remove_plugin_tables();

    // Remove plugin theme
    remove_plugin_theme();

    // Remove plugin templates
    remove_plugin_templates();

    // Remove plugin settings
    remove_plugin_settings();

    // Rebuild settings
    rebuild_settings();
}

// Returns plugin version
function plugin_version() {
    $info = require A3CREBORN_PLUGIN_ROOT.'/info.php';
    return $info['version'];
}
