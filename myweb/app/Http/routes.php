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


// 搭建后台模版
Route::get('/admin','AdminController@index');

// 用户模块
// Route::controller('/admin/user','UserController');

// 后台用户模版
// Route::controller('/admin/backuser','BackuserController');

// 分类管理
Route::controller('/admin/cate','CateController');

// 品牌管理
Route::controller('/admin/brand','BrandController');

// 商品管理
Route::controller('/admin/goods','GoodsController');

// 美妆商城首页
Route::controller('/mall','MallController');

// 商城首页
Route::controller('/','HdCOntroller');
// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });