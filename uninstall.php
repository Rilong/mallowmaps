<?php
    if(!defined('WP_UNINSTALL_PLUGIN'))
        exit();

    if (!defined('MOW_MAP_PATH'))
        define('MOW_MAP_PATH', plugin_dir_path(__FILE__));

    require  MOW_MAP_PATH . '/core/map.php';

    $map = new Mow_map();
    $map->getTableName();