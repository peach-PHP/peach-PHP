<?php
namespace App;

class Route extends RouteUtils
{
    static $methods = ['get', 'post', 'put', 'delete'];

    public static function loadRoutes($route_file) {
        require_once $route_file;
        self::triggerRoute();
    }

    public static function get($match_url, $actionParam) {
        self::syncRoute('get', trim($match_url, '/'), $actionParam, self::$methods);
    }

    public static function post($match_url, $actionParam) {
        self::syncRoute('post', trim($match_url, '/'), $actionParam, self::$methods);
    }

    public static function put($match_url, $actionParam) {
        self::syncRoute('put', trim($match_url, '/'), $actionParam, self::$methods);
    }

    public static function delete($match_url, $actionParam) {
        self::syncRoute('delete', trim($match_url, '/'), $actionParam, self::$methods);
    }
}

?>