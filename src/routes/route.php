<?php
use App\Route;

Route::get('/', 'HomeController@index');
Route::get('/foo', function () {
    echo "Hello Peach";
});
