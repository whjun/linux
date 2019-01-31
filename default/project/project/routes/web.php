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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/index',"Index\IndexController@index");//登录页
Route::get('/login',"Index\LoginController@login");//首页
Route::get('/mydesk',"Index\LoginController@mydesk");//我的桌面
Route::get('/information',"Index\InformationController@information");//咨询管理
