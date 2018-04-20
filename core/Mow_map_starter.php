<?php

namespace core;

require_once 'Mow_assets.php';

class Mow_map_starter {

    const TABLE_MAPS_DB = 'mallowmaps_maps';
    const TABLE_MAKERS_DB = 'mallowmaps_makers';

    public function start() {
        register_activation_hook(MOW_MAIN_FILE, array($this, 'activation'));
        register_deactivation_hook(MOW_MAIN_FILE, array($this, 'deactivation'));
        new Mow_admin();
        new Mow_ajax();
        new Mow_shortcodes();
    }

    public function activation() {
        $this->createTableMap();
        $this->createTableMakers();
        
        if (!get_option(Mow_admin::OPT_NAME))
            add_option(Mow_admin::OPT_NAME, array());
    }

    public function deactivation() {

    }

    public function createTableMap() {
        global $wpdb;

        $table_name = $this->getTableName(self::TABLE_MAPS_DB);
        $sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `lat` FLOAT NOT NULL , `lng` FLOAT NOT NULL , `marker` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , `offset` FLOAT NULL , `content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $wpdb->query($sql);
    }

    public function createTableMakers() {
        global $wpdb;

        $table_name = $this->getTableName(self::TABLE_MAKERS_DB);
        $sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `map_id` INT(11) NOT NULL , `lat` FLOAT NOT NULL , `lng` FLOAT NOT NULL , `offset` FLOAT NOT NULL , `content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL , PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB;";
        $wpdb->query($sql);
    }

    public function removeTableMap() {
        global $wpdb;

        $table_name = $this->getTableName(self::TABLE_MAPS_DB);
        $sql = "DROP TABLE `{$table_name}`";
        $wpdb->query($sql);
    }

    public function removeTableMakers() {
        global $wpdb;

        $table_name = $this->getTableName(self::TABLE_MAKERS_DB);
        $sql = "DROP TABLE `{$table_name}`";
        $wpdb->query($sql);
    }

    public function getTableName($table_name) {
        global $wpdb;
        return $wpdb->prefix . $table_name;
    }
}