<?php
/*
|--------------------------------------------------------------------------
|	Require all files required at the instance
|--------------------------------------------------------------------------
*/
use App\Controller as Controller;
use App\Route as Route;
use App\Database as Database;


/*
|--------------------------------------------------------------------------
|	Database initialize connection !!!
|--------------------------------------------------------------------------
*/
Database::connectDB(__DIR__.'/../src/config/database.php');


/*
|--------------------------------------------------------------------------
|	Controllers Load Here !!!
|--------------------------------------------------------------------------
*/
Controller::loadControllers(__DIR__.'/../src/controllers');


/*
|--------------------------------------------------------------------------
|	Route initiation !!!
|--------------------------------------------------------------------------
*/
Route::loadRoutes(__DIR__.'/../src/routes/route.php');

?>