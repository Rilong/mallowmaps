<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 13.04.2018
 * Time: 15:45
 */

namespace core;


class Mow_ajax {

    public function __construct() {
        add_action('wp_ajax_add_api_key', array($this, 'addApiKey'));
    }

    public function addApiKey() {
        $option = get_option(Mow_admin::OPT_NAME);

        if ($_POST['mow_activation_key']) {
            $option['api_key'] = $_POST['mow_activation_key'];
            update_option(Mow_admin::OPT_NAME, $option);
            echo 1;
        }
        else echo 0;
        exit;

    }

}