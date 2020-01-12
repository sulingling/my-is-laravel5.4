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
// 文章列表页面
Route::get('/', '\App\Http\Controllers\PostsController@index');
Route::get('/posts', '\App\Http\Controllers\PostsController@index');
// 创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostsController@create');
Route::post('/posts', '\App\Http\Controllers\PostsController@store');
// 文章详情页面
Route::get('/posts/{posts}', '\App\Http\Controllers\PostsController@show');
// 编辑文章
Route::get('/posts/{posts}/edit', '\App\Http\Controllers\PostsController@edit');
Route::put('/posts/{posts}', '\App\Http\Controllers\PostsController@update');
// 删除文章
Route::get('/posts/{posts}/delete', '\App\Http\Controllers\PostsController@delete');
// 文件上传
Route::post('/posts/image/upload', '\App\Http\Controllers\PostsController@imageUpload');
