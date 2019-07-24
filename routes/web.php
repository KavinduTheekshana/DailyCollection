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
// Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
Route::get('/', function () {
    return view('vendor.multiauth.admin.login');
});


Route::post('/addusers','UserController@addusers');

Route::post('/addroute','RoutesController@addroute');

