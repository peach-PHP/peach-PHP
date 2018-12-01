<?php
namespace App;

class RouteUtils
{
	protected function shouldExecute() {
        $parsedData = self::getSafeUri();
        if( self::inRoute( [$parsedData['REQUEST_METHOD'], $parsedData['ACTION_URI']] ) ){
            return true;
        }
        return false;
    }

    protected function inRoute($array){
        foreach ($GLOBALS['g_routes'] as $value) {
            if(($array[0] == $value[0]) and ($array[1] == $value[1])) {
                return true;
            }
        }
        return false;
    }

    protected function addRoute($verb, $match_url, $actionParam) {
        if(!self::inRoute([$verb, $match_url]))
            array_push( $GLOBALS['g_routes'], [$verb, trim($match_url, '/'), $actionParam]);
    }

    protected function getSafeUri() {
        $data = [];
        $data['REQUEST_METHOD'] = strtolower(strip_tags($_SERVER['REQUEST_METHOD']));
        $data['ACTION_URI'] = trim(trim(trim(strip_tags($_SERVER['REQUEST_URI']), '/'), BASE_DIR), '/');
        return $data;
    }

    protected function executeFun($actionParam) {
        if(is_string($actionParam) and sizeof(explode('@', $actionParam)) == 2) {
            $arr = explode('@', $actionParam);
            self::callFun($arr[0], $arr[1]);
        } elseif(is_callable($actionParam)) {
            $actionParam();
        } else {
            die("Something Wrong With Your Function. Please Check !!!");
        }
    }

    protected function callFun($controller, $fun) {
        if(class_exists($controller)) {
            $control = new $controller();
            if(in_array($fun, get_class_methods($controller))) {
                $control->$fun();
                return;
            }
            die("Function not found in Controller");
        }
        die("controller not found");
    }
}

?>