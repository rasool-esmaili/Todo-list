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

Route::get('/', 'Controller@showTask');
Route::post('/addtask', 'Controller@newTask');
Route::get('/delete/{id}', 'Controller@deleteTask');
Route::get('/pending/{id}', 'Controller@pendingTask');
Route::get('/done/{id}', 'Controller@doneTask');
