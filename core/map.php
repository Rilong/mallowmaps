<?php

class Mow_map {

    const TABLE_DB = 'mallowmaps';

    public function __construct() {

    }

    public function start() {
        register_activation_hook(MOW_MAIN_FILE, array($this, 'activation'));
        register_deactivation_hook(MOW_MAIN_FILE, array($this, 'deactivation'));
        register_uninstall_hook(MOW_MAIN_FILE, array($this, 'uninstall'));
    }

    public function activation() {
        $this->createTable();
    }

    public function deactivation() {

    }

    public function uninstall() {
        global $wpdb;

        $table_name = $wpdb->prefix . self::TABLE_DB;
        $sql = "DROP TABLE `{$table_name}`";
        $wpdb->query($sql);
    }

    public function createTable() {
        global $wpdb;

        $table_name = $wpdb->prefix . self::TABLE_DB;
        $sql = "CREATE TABLE `{$table_name}` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `lat` FLOAT NOT NULL , `lng` FLOAT NOT NULL , `marker` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , `offset` FLOAT NULL , `content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $wpdb->query($sql);
    }
}