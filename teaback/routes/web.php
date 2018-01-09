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

//后台管理员登录
Route::get('/', function () {
    return view('login');
});
//验证登录
Route::any('/login','LoginController@index');
//后台管理员模块
Route::any('/adminlist','AdminController@list');
Route::any('/adminadd','AdminController@add');
//角色模块
Route::any('/rolelist','RoleController@index');
Route::any('/roleadd','RoleController@add');
Route::any('/roleupd','RoleController@upd');

//权限模块
Route::any('/powerlist','PowerController@index');
Route::any('/poweradd','PowerController@add');
//订单管理
Route::any('/orderlist','OrderController@index');


//后台欢迎页
Route::get('/index',function(){ 
    return view('index');
});
//Route::any('/index','IndexController@index');
//商品管理路由
Route::group(['prefix' => 'goods'],function(){
   Route::any('index','GoodsController@index');
   Route::any('add','GoodsController@addData');
   Route::any('del','GoodsController@del');
   Route::any('upd','GoodsController@upd');
});
//商品属性管理
Route::group(['prefix' => 'goodsattr'],function(){
   Route::any('index','GoodsattrController@index');
   Route::any('add','GoodsattrController@addData');
   Route::any('inserts','GoodsattrController@inserts');
   // Route::any('del','GoodsattrController@del');
   // Route::any('upd','GoodsattrController@upd');
});
//产品管理
Route::group(['prefix' => 'product'],function(){
   Route::any('index','ProductController@index');
   Route::any('add','ProductController@addData');
   Route::any('del','ProductController@del');
   Route::any('upd','ProductController@upd');
});

//分类管理路由
Route::group(['prefix' => 'category'],function(){
   Route::get('index','CategoryController@index');
   Route::any('add','CategoryController@addData');
   Route::any('upd','CategoryController@updData');
   Route::any('del','CategoryController@delData');
});
//品牌管理
Route::group(['prefix' => 'brand'],function(){
   Route::get('index','BrandController@index');
   Route::any('add','BrandController@addData');
   Route::any('upd','BrandController@updData');
   Route::any('del','BrandController@delData');
});
//商品类型与属性管理
Route::group(['prefix' => 'attrtype'],function(){
	 //商品类型
     Route::any('typeadd','TypeController@addData');
     //商品列表
     Route::any('typeindex','TypeController@index');
     Route::any('typeupd','TypeController@upd');
     Route::any('typedel','TypeController@del');
     //商品属性
     Route::any('attradd','AttrController@addData');
     //商品属性列表
     Route::any('attrindex','AttrController@index');
     Route::any('attrupd','AttrController@upd');
     Route::any('attrdel','AttrController@del');
});
