<?php
namespace App;

use App\ConsoleUtils as Peach;

class Console
{
	public static function boot($arguments) {
		$peach = $arguments[0];
		$action = $arguments[1];
		isset($arguments[2]) ? $param = $arguments[2] : $param = '';
		self::decisionMaker($action, $param);
	}

	public static function decisionMaker($action, $param) {
		if(strtok($action, ':') == 'make')
			self::fileCreate($action, $param);
		else
			self::extraCurriculum($action, $param);
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

	public static function extraCurriculum($action, $param){
		switch ($action) {
			case 'show:info':
				Peach::show2D();
				break;
				
			default:
				die("Sorry! The given command is not supported");
				break;
		}
	}
}

?>