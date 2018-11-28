<?php
namespace App;

class Route
{
    private function getSafeUri() {
        $data = [];
        $data[] = strtolower(strip_tags($_SERVER['REQUEST_METHOD']));
        $data[] = trim(trim(trim(strip_tags($_SERVER['REQUEST_URI']), '/'), BASE_URI), '/');
        return $data;
    }

    public static function get($uri, $control_function) {
        $route_obj = new Route();
        $data = $route_obj->getSafeUri();
        if ($data[0] == 'get') {
            if (trim($uri, '/') == $data[1]) {
                $arr = explode('@', $control_function);
                $controller = $arr[0];
                if(class_exists($controller)) {
                    $control = new $controller();
                    $fun = $arr[1];
                    if(in_array($fun, get_class_methods($controller))) {
                        $control->$fun();
                    } else {
                        die("function not found !!!");
                    }
                } else {
                    die('Class Not Found !!!');
                }
            } else {
                //  Go for next
            }
        } else {
            //  Go for next
        }
    }

    public static function post($uri, $control_function) {
        $route_obj = new Route();
        $data = $route_obj->getSafeUri();
        if ($data[0] == 'post') {
            if (trim($uri, '/') == $data[1]) {
                $arr = explode('@', $control_function);
                $controller = $arr[0];
                if(class_exists($controller)) {
                    $control = new $controller();
                    $fun = $arr[1];
                    if(in_array($fun, get_class_methods($controller))) {
                        $control->$fun();
                    } else {
                        die("function not found !!!");
                    }
                } else {
                    die('Class Not Found !!!');
                }
            } else {
                //  Go for next
            }
        } else {
            //  Go for next
        }
    }

    public static function load($route_file) {
        require_once $route_file;
    }

    public static function loadRoutes($route_file) {
        Route::load($route_file);
    }
}

?>