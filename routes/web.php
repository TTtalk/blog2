<?php



Route::get('/', function () {
    return view('welcome');
});

//后台登录路由
Route::get('admin/login','Admin\LoginController@login');
//验证码路由
Route::get('admin/code','Admin\LoginController@code');
//处理后台登录路由
Route::post('admin/dologin','Admin\LoginController@doLogin');
//加密算法
Route::get('admin/jiami','Admin\LoginController@jiami');


//后台首页路由
Route::get('admin/index','Admin\LoginController@index');
//后台欢迎页
Route::get('admin/welcome','Admin\LoginController@welcome');
