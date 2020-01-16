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

//Route::get('/', function () {
    //return view('auth.login');
//})->name('login');


Route::get('/show', function () {
    return view('admin.projectshow');
});
Auth::routes();
//alluser dashboard
Route::get('/', 'HomeController@index')->name('home');




//admin 
Route::resource('client', 'ClientController')->middleware('admin');
Route::resource('project', 'ProjectController')->middleware('admin');
Route::resource('division', 'DivisionController')->middleware('admin');
Route::resource('user', 'UserController')->middleware('admin');


//head
Route::group(['middleware'=>['auth','head']],function(){
Route::get('/headproject', 'ModuleController@headproject')->name('headproject');
Route::resource('module', 'ModuleController');
Route::resource('group', 'GroupController');
//Route::resource('member', 'MemberController');
Route::get('/projectmodule/{id}','ModuleController@modulelist')->name('modulelist');
Route::get('/moduleassign/{id}','ModuleassignController@edit')->name('moduleassign');
Route::PATCH('/moduleassignupdate/{id}','ModuleassignController@update')->name('moduleassignupdate');
});
//Route::get('/client','ClientController@create')->name('clientadd');
//Route::POST('/client/store','ClientController@store')->name('clientstore');


Route::get('memberlist/{id}', 'MemberController@index')->name('memberlist');
Route::POST('memberadd', 'MemberController@update')->name('memberadd');
Route::GET('memberdestroy/{id}', 'MemberController@destroy')->name('memberdestroy');



//manager
Route::resource('task', 'TaskController');
Route::get('/managermodule', 'TaskController@managermodule')->name('managermodule');
Route::get('/tasklist/{id}','TaskController@tasklist')->name('tasklist');


Route::get('/taskassign/{id}','TaskassignController@edit')->name('taskassign');
Route::PATCH('/taskassignupdate/{id}','TaskassignController@update')->name('taskassignupdate');


//employee
Route::resource('employeetask', 'EmployeetaskController');