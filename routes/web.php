<?php
// 用户模块
// 注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
// 注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
// 登陆页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
// 登陆行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');
// 登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
// 个人设置页面
Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
// 个人设置行为
Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');

// 文章列表页面
Route::get('/', '\App\Http\Controllers\LoginController@index');
Route::get('/posts', '\App\Http\Controllers\PostsController@index');
// 创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostsController@create');
Route::post('/posts', '\App\Http\Controllers\PostsController@store');
// 文章详情页面
Route::get('/posts/{posts}', '\App\Http\Controllers\PostsController@show');
// 文章点赞
Route::get('/posts/{post}/assist', '\App\Http\Controllers\PostsController@assist');
// 文章取消赞
Route::get('/posts/{post}/unassists', '\App\Http\Controllers\PostsController@unAssist');
// 编辑文章
Route::get('/posts/{posts}/edit', '\App\Http\Controllers\PostsController@edit');
Route::put('/posts/{posts}', '\App\Http\Controllers\PostsController@update');
// 删除文章
Route::get('/posts/{posts}/delete', '\App\Http\Controllers\PostsController@delete');
// 文件上传
Route::post('/posts/image/upload', '\App\Http\Controllers\PostsController@imageUpload');
// 提交评论
Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostsController@comment');

// 个人中心
Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
// 个人中心关注
Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
// 个人中心取消关注
Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unFan');

// 专题详情页面
Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');
// 投稿
Route::post('/topic/{topic}/submit', '\App\Http\Controllers\TopicController@submit');

// 通知
Route::get('/notices', '\App\Http\Controllers\NoticeController@index');

include_once 'admin.php';
