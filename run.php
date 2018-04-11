<?php

define('MOW_MAP_PATH', plugin_dir_path(__FILE__));
define('MOW_ASSET_URI', plugins_url('assets', __FILE__));

spl_autoload_register('mow_autoloader');

function mow_autoloader($class) {
    $class = str_replace('\\', '/', $class);
    $file = MOW_MAP_PATH . '/' . $class . '.php';

    if (file_exists($file))
        require_once $file;

}
