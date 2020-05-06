<?php

// Creates plugin tables
function create_plugin_tables() {
    global $db;

    $db->write_query("CREATE TABLE ".TABLE_PREFIX."a3creborn_userscache (
        uid int unsigned NOT NULL,
        type varchar(100) NOT NULL,
        cache mediumtext NOT NULL,
        PRIMARY KEY (uid)
    ) ENGINE=MyISAM;");

    $db->write_query("CREATE TABLE ".TABLE_PREFIX."a3creborn (
        variable varchar(100) NOT NULL,
        value varchar(100) NOT NULL,
        PRIMARY KEY (variable)
    ) ENGINE=MyISAM;");
}

// Removes plugin tables
function remove_plugin_tables() {
    global $db;

    $db->write_query("DROP TABLE IF EXISTS ".TABLE_PREFIX."a3creborn;");
    $db->write_query("DROP TABLE IF EXISTS ".TABLE_PREFIX."a3creborn_userscache;");
}
