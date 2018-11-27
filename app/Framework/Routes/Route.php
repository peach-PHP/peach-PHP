<?php
namespace App;

class Route
{
    private function getSafeUri()
    {
        $data = [];
        $data[] = strtolower(strip_tags($_SERVER['REQUEST_METHOD']));
        $data[] = trim(strip_tags($_SERVER['REQUEST_URI']), '/');
        return $data;
    }

    public static function get($uri, $control_function)
    {
        $route_obj = new Route();
        $data = $route_obj->getSafeUri();
        if ($data[0] == 'get') {
            if (trim($uri, '/') == $data[1]) {
                $arr = explode('@', $control_function);
                $controller = $arr[0];
                $control = new $controller();
                $fun = $arr[1];
                $control->$fun();
            } else {
                die('Route Not Found !!');
            }
        } else {
            die('Invalid request method');
        }
    }

    public static function aman(){
        echo "hell";
    }
}

?>