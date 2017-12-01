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

Route::get('/', function () {
    return view('welcome');
});



// 后台
Route::group(['prefix' => 'admin'], function () {
  // 首页
  Route::get('index', 'Admin\IndexController@index');

  // 管理员管理
  // Route::get('/manager/index', 'Admin\ManagerController@index');
  // Route::get('/manager/create', 'Admin\ManagerController@create');
  Route::resource('manager', 'Admin\ManagerController');

  // 角色管理
  // Route::get('/role/index', 'Admin\RoleController@index');
  // Route::get('/role/create', 'Admin\RoleController@create');
  Route::resource('role', 'Admin\RoleController');

  // 权限管理
  // Route::get('/permission/index', 'Admin\PermissionController@index');
  // Route::get('/permission/create', 'Admin\PermissionController@create');
  Route::resource('permission', 'Admin\PermissionController');
});
