<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 14.04.2018
 * Time: 18:19
 */

namespace core;


class Mow_shortcodes {
    public function __construct() {
        add_shortcode('mallowmap', array($this, 'map'));
    }

    public function map($attrs) {
        return print_r($attrs, true);
    }
}