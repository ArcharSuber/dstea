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
//产品管理路由
Route::group(['prefix' => 'product'],function(){
   Route::get('index','ProductController@index');
   Route::match(['get','post'],'increase','ProductController@increase');
   Route::get('delete','ProductController@delete');
   Route::match(['get','post'],'alter','ProductController@alter');
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
