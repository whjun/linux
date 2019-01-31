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

//Route::any("login/{action?}",function(App\Http\Controllers\login\LoginController $c,$action = "login"){
//    return $c->$action();
//});
//Route::any("index/{action?}",function(App\Http\Controllers\Index\IndexController $c,$action = "index"){
//    return $c->$action();
//});

Route::get('/index',"Index\IndexController@index");
Route::get('/login',"Login\LoginController@login");
