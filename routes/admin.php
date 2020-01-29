<?php
// 管理后台
Route::group(['prefix' => 'admin'], function () {
	// 登陆页面
	Route::get('/login', '\App\admin\Controllers\LoginController@index');
	// 登陆行为
	Route::post('/login', '\App\admin\Controllers\LoginController@login');
	// 登出行为
	Route::get('/logout', '\App\admin\Controllers\LoginController@logout');

	// 后台登陆需要设置权限
	Route::group(['middleware' => 'auth:admin'], function () {
		// 首页
		Route::get('/home', '\App\admin\Controllers\HomeController@index');

		// 管理人员模块
		Route::get('/user', '\App\admin\Controllers\UserController@index');
		Route::get('/user/create', '\App\admin\Controllers\UserController@create');
		Route::post('/user/store', '\App\admin\Controllers\UserController@store');

		// 审核模块
		Route::get('/posts', '\App\admin\Controllers\PostController@index');
		Route::post('/posts/{post}/status', '\App\admin\Controllers\PostController@status');
	});

});