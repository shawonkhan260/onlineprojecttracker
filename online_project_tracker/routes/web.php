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

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/no', 'DashboardController@noaccess')->name('noaccess')->middleware('auth');
/* link for admin */
//Route::get('/admin', 'DashboardController@admin')->name('admin')->middleware('auth','admin');
/* link for manager */
//Route::get('/manager', 'DashboardController@manager')->name('manager')->middleware('manager');

/* link for employee */
//Route::get('/employee', 'DashboardController@employee')->name('employee')->middleware('employee');