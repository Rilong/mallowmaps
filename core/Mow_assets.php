<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 11.04.2018
 * Time: 11:38
 */

namespace core;


class Mow_assets {

    public function frontStart() {
        add_action('wp_enqueue_scripts', array($this, 'front'));
    }

    public function adminStart($uri) {
        add_action("admin_print_scripts-$uri", array($this, 'admin'));
    }

    public function front() {
        self::cssAsset();
        self::jsAsset();
    }

    public function admin() {
        self::adminCssAsset();
        self::adminJsAsset();
    }

    public static function jsAsset() {

    }

    public static function cssAsset() {
        wp_enqueue_style('mow_styles', MOW_ASSET_URI . '/front/css/style.css', array(), false);
    }

    public static function adminJsAsset() {

    }

    public static function adminCssAsset() {
        wp_enqueue_style('mow_opt_panel', MOW_ASSET_URI . '/admin/css/mallowmaps-panel.css', array(), false);
    }

}