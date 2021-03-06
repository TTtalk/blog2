<?php



//Route::get('/', function () {
//    return view('welcome');
//});



Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台登录路由
    Route::get('login','LoginController@login');
//验证码路由
    Route::get('code','LoginController@code');
//处理后台登录路由
    Route::post('dologin','LoginController@doLogin');
//加密算法
    Route::get('jiami','LoginController@jiami');
});




Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'isLogin'],function (){
    //后台首页路由
    Route::get('index','LoginController@index');
//后台欢迎页
    Route::get('welcome','LoginController@welcome');
//后台退出登录路由
    Route::get('logout','LoginController@logout');



    //后台用户模块相关路由   //删除所有选中用户路由
    Route::get('user/del','UserController@delAll');

    Route::resource('user','UserController');

    //角色模块
    //角色授权路由
    Route::get('role/auth/{id}','RoleController@auth');
    Route::resource('role','RoleController');

});
