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

		// 系统管理
		Route::group(['middleware' => 'can:system'], function () {
			// 管理人员模块
			Route::get('/users', '\App\admin\Controllers\UserController@index');
			Route::get('/users/create', '\App\admin\Controllers\UserController@create');
			Route::post('/users/store', '\App\admin\Controllers\UserController@store');
			Route::get('/users/{user}/role', '\App\admin\Controllers\UserController@role');
			Route::post('/users/{user}/role', '\App\admin\Controllers\UserController@storeRole');

			// 权限
			Route::get('/permissions', '\App\admin\Controllers\PermissionsController@index');
			Route::get('/permissions/create', '\App\admin\Controllers\PermissionsController@create');
			Route::post('/permissions/store', '\App\admin\Controllers\PermissionsController@store');

			// 角色
			Route::get('/roles', '\App\admin\Controllers\RoleController@index');
			Route::get('/roles/create', '\App\admin\Controllers\RoleController@create');
			Route::post('/roles/store', '\App\admin\Controllers\RoleController@store');
			Route::get('/roles/{role}/permission', '\App\admin\Controllers\RoleController@permission');
			Route::post('/roles/{role}/permission', '\App\admin\Controllers\RoleController@storePermission');
		});

		// 文章管理
		Route::group(['middleware' => 'can:post'], function () {
			// 审核模块
			Route::get('/posts', '\App\admin\Controllers\PostController@index');
			Route::post('/posts/{post}/status', '\App\admin\Controllers\PostController@status');
		});

		// 专题管理
		Route::group(['middleware' => 'can:topic'], function () {
			Route::resource('/topics', '\App\admin\Controllers\TopicController', ['only' => ['index', 'create', 'store', 'desc']]);
		});

	});

});