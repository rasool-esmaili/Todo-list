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

Route::get('/', 'TaskController@showTask');
Route::post('/addtask', 'TaskController@newTask');

Route::get('/delete/{id}', 'Controller@deleteTask');
Route::get('/pending/{id}', 'Controller@pendingTask');
Route::get('/done/{id}', 'Controller@doneTask');
Route::get('/group/{id}', 'TaskController@filterGroupTask');
