<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return View::make('index');
});
Route::get('todos', function () {
    return \App\Todo::All();
});
//Route::get('todos', 'TodoController@index');
Route::post('todos', 'TodoController@store');
//Route::post('todos', function () {
    //return  \App\Todo::create(Input::all());
    //return \App\Todo::create(request()->all());
//});
