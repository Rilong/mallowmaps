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
        if ($key = Mow_map::getApiKey()) {
            wp_enqueue_script('google-map-api', Mow_map::getMapUri($key), array(), false, true);
            wp_enqueue_script('magnific-popup-js', MOW_ASSET_URI . '/admin/js/jquery.magnific-popup.min.js', array(), false, true);
            wp_enqueue_script('mow-admin-map', MOW_ASSET_URI . '/admin/js/map.js', array(), false, true);
        }
        wp_enqueue_script('mow-mallowmaps-ajax', MOW_ASSET_URI . '/admin/js/ajax.js', 'jquery', false, true);
    }

    public static function adminCssAsset() {
        wp_enqueue_style('magnific-popup-css', MOW_ASSET_URI . '/admin/css/magnific-popup.css', array(), false);
        wp_enqueue_style('magnific-theme-css', MOW_ASSET_URI . '/admin/css/standard-theme.css', array(), false);
        wp_enqueue_style('mow_opt_panel', MOW_ASSET_URI . '/admin/css/mallowmaps-panel.css', array(), false);
    }

}