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
Route::get('/viewuser', 'UserController@viewuser')->name('viewuser');
Route::get('/updateuser/{id}','UserController@updateuser');
Route::get('/addcustomers', 'CustomerController@addcustomers')->name('admin.addcustomers');


Route::post('/addroute','RoutesController@addroute');
Route::post('/addholiday','HolidaysController@addholiday');
Route::post('/editcoustomer','CustomerController@editcoustomer');




Route::get('deleteroute/{id}','RoutesController@deleteroute');
Route::get('deleteuser/{id}','UserController@deleteuser');
Route::get('deleteholidaty/{id}','HolidaysController@deleteholidaty');