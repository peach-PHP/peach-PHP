<?php
namespace App;

use App\View as View;

class Controller
{
    public static function loadControllers($controller_location) {
    	$controllers_array = scandir($controller_location);
    	for ($i=2; $i <= sizeof($controllers_array) - 1; $i++) { 
    		require_once $controller_location. '/' .$controllers_array[$i];
    	}
    }

    public function View($viewPage) {
    	View::viewPage($viewPage);
    }
}