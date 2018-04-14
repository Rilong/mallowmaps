<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 11.04.2018
 * Time: 21:30
 */

namespace core;


class Mow_admin {

    const OPT_NAME = 'mallowmaps';
    const OPT_TITLE = 'MallowMaps';
    const OPT_SLUG = 'mallowmaps';
    const LINK_G_API = 'https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend,places_backend&reusekey=true&hl=ru';

    public $opt_uri;
    private $map_options;

    public function __construct() {
        $this->map_options = get_option(self::OPT_NAME);
        $this->hooks();
    }

    public function hooks() {
        add_action('admin_menu', array($this, 'menu'));
    }

    public function menu() {
        $this->opt_uri = add_menu_page(self::OPT_TITLE, self::OPT_TITLE, 'manage_options', self::OPT_SLUG, array($this, 'page'));
        $assets = new Mow_assets();
        $assets->adminStart($this->opt_uri);
    }

    public function page() {
        $title = self::OPT_TITLE;
        $content = '';

        if (!isset($this->map_options['api_key'])) {
            $content = $this->load_tpl('activation', array('link' => self::LINK_G_API), true);
        }else {
            $content = $this->load_tpl('home', array(), true);
            $content .= $this->load_tpl('create-map', array(), true);
        }

        $this->load_tpl('main', compact('title', 'content'));
    }

    private function load_tpl($name, $data = array(), $return = false) {
        $file = MOW_MAP_PATH . '/tpl/admin/' . $name . '.php';
        $content = null;
        extract($data);

        if (file_exists($file)) {
            ob_start();
            require $file;
            $content = ob_get_clean();
        }

        if (!$return) {
            echo $content;
            return null;
        }
        return $content;
    }

}