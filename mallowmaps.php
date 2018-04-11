<?php
    /*
    Plugin Name: Mallowmaps
    Plugin URI:
    Description: Google maps
    Author: Mallowthemes
    Version: 1.0
    Author URI:
     */

    require plugin_dir_path(__FILE__) . '/run.php';

    use core\Mow_map_starter;
    use core\Mow_assets;

    define('MOW_MAIN_FILE', __FILE__);

    $map = new Mow_map_starter();
    $assets = new Mow_assets();
    $map->start();