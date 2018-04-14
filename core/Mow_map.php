<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 14.04.2018
 * Time: 12:37
 */

namespace core;


class Mow_map {
    public static function getMapUri($api_key) {
        return str_replace('%API_KEY%', $api_key, MOW_MAP_URI);
    }
    public static function getApiKey() {
        $params = get_option(Mow_admin::OPT_NAME);

        if ($params['api_key'])
            return $params['api_key'];
        return false;
    }
}