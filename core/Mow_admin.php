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

    public $opt_uri;

    public function __construct() {
        $this->hooks();
    }

    public function hooks() {
        add_action('admin_menu', array($this, 'menu'));
    }

    public function menu() {
        $this->opt_uri = add_menu_page(self::OPT_TITLE, self::OPT_TITLE, 'manage_options', self::OPT_SLUG, array($this, 'page'));
    }

    public function page() {
        $title = self::OPT_TITLE;

        $this->load_tpl('main', compact('title'));
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