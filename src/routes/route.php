<?php
use App\Route;

Route::get('/', 'HomeController@index');
Route::get('/abc', 'HomeController@index2');
