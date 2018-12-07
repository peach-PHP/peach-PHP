<?php
namespace App;

class ConsoleUtils
{
	public static function createCopyFile($tuple, $name) {
		$file_content = file_get_contents(__DIR__.'/Tubs/'.$tuple.'.tubs.default');
		$file_content = str_replace('DUMMY', $name, $file_content);
		file_put_contents(__DIR__.'/../../../src/'.strtolower($tuple).'s'.'/'.$name.'.php', $file_content, FILE_USE_INCLUDE_PATH);
	}

	public static function startServer($param) {
		empty($param) or !is_numeric($param) ? $port = 8000 : $port = $param;
		echo "\nDevelopment Server Starting at http://localhost:".$port."\n\n";
		$cmd_res = shell_exec('php -S localhost:'.$port);
	}

	public static function show2D() {
		echo "
         _________   _________  ___________  ________   __     ___
        / ______  / / _______/ /  ____    / / ______/  /  /   /  /
       / /____ / / / /___     /  /___/   / / /        /  /___/  /
      / ________/ / ____/    /  _____   / / /        /  ____   /
     / /         / /______  /  /    /  / / /______  /  /   /  /
    /_/         /________/ /__/    /__/ /________/ /_ /   /__/
		";

		echo "\n  Hello, Welcome to Peach PHP Framework. Peach is a php mvc framework \ndesigned to speed up your coding process with ready to use libraries.\n";
		echo "\nBuild Something Great !!!\n";
	}
}


?>