<?php
namespace App;

class ConsoleUtils
{
	public static function createCopyFile($tuple, $name) {
		$file_content = file_get_contents(__DIR__.'/Tubs/'.$tuple.'.tubs.default');
		$file_content = str_replace('DUMMY', $name, $file_content);
		file_put_contents(__DIR__.'/../../../src/'.strtolower($tuple).'s'.'/'.$name.'.php', $file_content, FILE_USE_INCLUDE_PATH);
	}
}

?>