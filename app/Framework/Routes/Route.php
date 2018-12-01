<?php
namespace App;

class Route extends RouteUtils
{
    static function loadRoutes($route_file) {
        require_once $route_file;
    }

    public static function get($match_url, $actionParam) {
        $verb = 'get';
        self::addRoute($verb, trim($match_url, '/'), $actionParam);
        if(self::shouldExecute()){
            self::executeFun($actionParam);
        }
    }

    public static function get($match_url, $actionParam) {
        $verb = 'post';
        self::addRoute($verb, trim($match_url, '/'), $actionParam);
        if(self::shouldExecute()){
            self::executeFun($actionParam);
        }
    }
}

?>