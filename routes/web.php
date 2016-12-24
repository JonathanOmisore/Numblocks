<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/app', function () {
    return view('numblocks');
});
Route::get('/data', function () {
	$data = file_get_contents("../resources/views/data");
    return response($data);
});
Route::post('/process', 'ProcessController@process');
