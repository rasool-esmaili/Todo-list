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

Route::get('/delete/{id}', 'TaskController@deleteTask');
Route::get('/pending/{id}', 'TaskController@pendingTask');
Route::get('/done/{id}',    'TaskController@doneTask');
Route::get('/group/{id}',  'TaskController@filterGroupTask');
