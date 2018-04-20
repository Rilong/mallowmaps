<?php


    if(!defined('WP_UNINSTALL_PLUGIN'))
        exit();

    require plugin_dir_path(__FILE__) . '/run.php';

    use core\Mow_map_starter;
    use core\Mow_admin;

    $map = new Mow_map_starter();
    $map->removeTableMap();
    delete_option(Mow_admin::OPT_NAME);