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

Route::get('login',"Login\LoginController@login");
Route::post('login_do',"Login\LoginController@login_do");
Route::post('register',"Login\LoginController@register");
Route::post('register_do',"Login\LoginController@register_do");
Route::get('index',"Index\IndexController@index");
Route::get('welcome',"Index\IndexController@welcome");
Route::get('article_list',"Index\IndexController@article_list");
Route::get('article_add',"Index\IndexController@article_add");
Route::get('product_list',"Product\ProductController@product_list");
Route::get('product_add',"Product\ProductController@product_add");
Route::post('product_add_do',"Product\ProductController@product_add_do");
Route::post('del_product',"Product\ProductController@del_product");
Route::any('update_product',"Product\ProductController@update_product");
Route::any('product_save',"Product\ProductController@product_save");
Route::any('search_product',"Product\ProductController@search_product");
Route::any('static_product',"Product\ProductController@static_product");

Route::get('product_brand',"Product\ProductController@product_brand");
Route::post('product_brand_do',"Product\ProductController@product_brand_do");
Route::post('brand_del',"Product\ProductController@brand_del");
Route::get('brand_update',"Product\ProductController@brand_update");
Route::post('save',"Product\ProductController@save");

Route::get('product_category',"Product\ProductController@product_category");
Route::get('product_category_add',"Product\ProductController@product_category_add");

Route::any('member_list',"Vip\VipController@member_list");
Route::any('member_add',"Vip\VipController@member_add");
Route::any('member_add_do',"Vip\VipController@member_add_do");

Route::post('product_category_add_do',"Product\ProductController@product_category_add_do");
Route::post('uploaded',"BaseController@uploaded");

Route::get('picture_list',"Broadcast\BroadcastController@picture_list");
Route::get('picture_add',"Broadcast\BroadcastController@picture_add");
Route::get('picture_show',"Broadcast\BroadcastController@picture_show");
Route::post('picture_add_do',"Broadcast\BroadcastController@picture_add_do");

Route::any('admin_role',"Admin\AdminController@admin_role");
Route::any('admin_role_add',"Admin\AdminController@admin_role_add");
Route::any('admin_permission',"Admin\AdminController@admin_permission");
Route::any('admin_role_add_do',"Admin\AdminController@admin_role_add_do");

Route::any("type","Api\ApiController@type");

Route::any("pay","Pay\PayController@index");

Route::any("return_url","Pay\PayController@return_url");