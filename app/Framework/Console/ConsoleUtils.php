<?php
namespace App;

class ConsoleUtils
{
	public static function createCopyFile($tuple, $name) {
		$file_content = file_get_contents(__DIR__.'/Tubs/'.$tuple.'.tubs.default');
		$file_content = str_replace('DUMMY', $name, $file_content);
		file_put_contents(__DIR__.'/../../../src/'.strtolower($tuple).'s'.'/'.$name.'.php', $file_content, FILE_USE_INCLUDE_PATH);
	}

	public static function show2D() {
		echo "
		   /dddddddho`  -dddddddddd`      +ddd        :sdmNNdy:    ydd`    /dd
		   dMN    sMMh  hMM              sMNNMs     :mMmo:--oMMy   MMy     mMN
		  :MMs    oMMs .MMd             dMd.yMN    -MMh`           hMM+::::+MM 
		  hMMNmmNMMmo  yMMmmmmmmmo     mMh   MM    hMM.            MMNmmmmmMMM 
		 .MMh         `MMh           :NMMmddmMMy   hMM.     os+    sMM:    -MM  
		 yMM-         oMMs________  oMMo     hMN   -NMm+::+mMN/    NMd     hMM  
		`hhy          yhhhhhhhhhh` +hh:      :hh    `+hdmmds/     /hh:    `hhs   
		";
	}
}

?>