<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 搭建后台模版
Route::get('/admin','AdminController@index');

// 分类管理
Route::controller('/admin/cate','CateController');

// 品牌管理
Route::controller('/admin/brand','BrandController');

// 商品管理
Route::controller('/admin/goods','GoodsController');