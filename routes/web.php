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

Route::post('/addusers', 'UserController@addusers');
Route::get('/viewuser', 'UserController@viewuser')->name('viewuser');
Route::get('/updateuser/{id}', 'UserController@updateuser');
Route::get('/addcustomers', 'CustomerController@addcustomers')->name('admin.addcustomers');
Route::get('/managecustomers', 'CustomerController@managecustomers')->name('admin.managecustomers');
Route::get('/blockcustomer/{id}', 'CustomerController@blockcustomer');
Route::get('/unblockcustomer/{id}', 'CustomerController@unblockcustomer');
Route::get('/deletecustomer/{id}', 'CustomerController@deletecustomer');
Route::post('/edituser', 'UserController@edituser');

Route::post('/addroute', 'RoutesController@addroute');
Route::post('/addholiday', 'HolidaysController@addholiday');

Route::post('/submitcustomers', 'CustomerController@submitcustomers');
Route::post('/editcustomers', 'CustomerController@editcustomers');

Route::get('deleteroute/{id}', 'RoutesController@deleteroute');
Route::get('deleteuser/{id}', 'UserController@deleteuser');
Route::get('deleteholidaty/{id}', 'HolidaysController@deleteholidaty');

// Route::post('customer/valid_nic','CustomerController@valid_nic')->name('valid_nic');
// Route::POST('valid_nic','CustomerController@valid_nic')->name('valid_nic');

Route::get('/routes', 'RoutesController@show')->name('admin.routes');

Route::post('/updateprofilepic', 'ProfileController@updateprofilepic');
Route::post('/updatepassword', 'ProfileController@updatepassword');
Route::post('/updateprofiledetails', 'ProfileController@updateprofiledetails');
