<?php
namespace App;

use App\ConsoleUtils as Peach;

class Console
{
	public static function boot($arguments) {
		$peach = $arguments[0];
		$action = $arguments[1];
		$param = $arguments[2];
		self::decisionMaker($action, $param);
	}

	public static function decisionMaker($action, $param) {
		if(strtok($action, ':') == 'make')
			self::fileCreate($action, $param);
	}

	public static function fileCreate($action, $param){
		switch ($action) {
			case 'make:controller':
				Peach::createCopyFile('Controller', $param);
				break;

			case 'make:model':
				Peach::createCopyFile('Model', $param);
				break;
			
			default:
				die("Sorry! The given command is not supported");
				break;
		}
	}
}

?>