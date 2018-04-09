<?php
    /*
    Plugin Name: Mallowmaps
    Plugin URI:
    Description: Google maps
    Author: Mallowthemes
    Version: 1.0
    Author URI:
     */

    define('MOW_MAP_PATH', plugin_dir_path(__FILE__));
    define('MOW_MAIN_FILE', __FILE__);

    require  MOW_MAP_PATH . '/core/map.php';

    $map = new Mow_map();
    $map->start();