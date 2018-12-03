<?php
namespace App;
/*
|--------------------------------------------------------------------------
|   Core Route logic goes here !!!
|--------------------------------------------------------------------------
*/

use App\View as View;

class RouteUtils
{
    protected static $methods;

    protected function syncRoute($verb, $match_url, $actionParam, $methods) {
        self::$methods = $methods;
        self::addRoute($verb, trim($match_url, '/'), $actionParam);
    }

    protected function addRoute($verb, $match_url, $actionParam) {
        if(!self::inRoute([$verb, $match_url]))
            array_push( $GLOBALS['g_routes'], [$verb, trim($match_url, '/'), $actionParam]);
    }

    protected function triggerRoute() {
        if(self::shouldExecute()){
            self::executeFun();
            die();
        } else {
            View::viewPage('errors.404');
            die();
        }
    }

    

    //  Check for route to be present in $GLOBALS['g_routes']
    protected function inRoute($array){
        foreach ($GLOBALS['g_routes'] as $value) {
            if(($array[0] == $value[0]) and ($array[1] == $value[1])) {
                return true;
            }
        }
        return false;
    }

    //  Strip scripts to prevent JS injections and find 'method_field'
    protected function getSafeUri() {
        $data = [];
        $header_method = strtolower(strip_tags($_SERVER['REQUEST_METHOD']));
        $data['REQUEST_METHOD'] = self::findRequestMethod($header_method);
        $data['ACTION_URI'] = trim(trim(trim(strip_tags($_SERVER['REQUEST_URI']), '/'), BASE_DIR), '/');
        return $data;
    }

    //  Is route in the list defined ??
    protected function shouldExecute() {
        $parsedData = self::getSafeUri();
        if( self::inRoute( [$parsedData['REQUEST_METHOD'], $parsedData['ACTION_URI']] ) ){
            return true;
        }
        return false;
    }

    //  Find request method -- 'method_field'
    protected function findRequestMethod($header_method) {
        if($header_method == 'get')
            return 'get';
        elseif($header_method == 'post') {
            if(isset($_POST['method_field']) and !empty($_POST['method_field']) and in_array($_POST['method_field'], self::$methods)){
                return $_POST['method_field'];
            } else {
                return 'post';
            }
        }
    }

    //  Execute the required function
    protected function executeFun() {
        $actionParam = self::findFunctionToExec();
        if(is_string($actionParam) and sizeof(explode('@', $actionParam)) == 2) {
            $arr = explode('@', $actionParam);
            self::callFun($arr[0], $arr[1]);
        } elseif(is_callable($actionParam)) {
            $actionParam();
        } else {
            die("Something Wrong With Your Function. Please Check !!!");
        }
    }

    //  Finds the function corresponding to each route
    protected function findFunctionToExec() {
        $parsedUriData = self::getSafeUri();
        $method = $parsedUriData['REQUEST_METHOD'];
        $uri = $parsedUriData['ACTION_URI'];
        foreach ($GLOBALS['g_routes'] as $value) {
            if($method == $value[0] and $uri == $value[1])
                return $value[2];
        }
    }

    //  calls the function from route
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