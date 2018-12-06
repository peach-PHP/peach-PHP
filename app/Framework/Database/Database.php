<?php
namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
	public static function connectDB($config_file_src) {
		$capsule = new Capsule();
		$capsule->addConnection(require_once $config_file_src);
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}

?>