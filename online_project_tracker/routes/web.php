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

Route::group(['middleware'=>['auth']],function(){
Route::get('/messagelist', 'HomeController@home')->name('messagelist');
Route::get('/message/{id}', 'HomeController@getMessage')->name('message');
Route::post('message', 'HomeController@sendMessage');
});
//Route::get('/', function () {
    //return view('auth.login');
//})->name('login');


Route::get('/show', function () {
    return view('admin.projectshow');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
//alluser dashboard
Route::get('/', 'HomeController@index')->name('home');
//profile
Route::GET('/profile', 'ProfileController@show')->name('profile');
Route::PATCH('/profile/{id}', 'ProfileController@changepicture')->name('changepicture');
Route::PATCH('/profileinfo/{id}', 'ProfileController@changeinfo')->name('changeinfo');
Route::GET('/profilepass/{id}', 'ProfileController@passwordpage')->name('passwordpage');
Route::PATCH('/changepass/{id}', 'ProfileController@changepass')->name('changepass');
});


//admin 
Route::resource('client', 'ClientController')->middleware('admin');
Route::resource('project', 'ProjectController')->middleware('admin');
Route::get('/completeproject','ProjectController@completeproject')->name('completeproject')->middleware('admin');
Route::get('/print','ProjectController@printproject')->name('print')->middleware('admin');
Route::get('/printcomplete','ProjectController@printcompleteproject')->name('printcomplete')->middleware('admin');
Route::get('/printspecific/{id}','ProjectController@printspecificproject')->name('printspecific')->middleware('admin');
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
Route::get('memberlist/{id}', 'MemberController@index')->name('memberlist');
Route::POST('memberadd', 'MemberController@update')->name('memberadd');
Route::GET('memberdestroy/{id}', 'MemberController@destroy')->name('memberdestroy');
});




//manager
Route::resource('task', 'TaskController');
Route::get('/managermodule', 'TaskController@managermodule')->name('managermodule');
Route::get('/completemodule', 'TaskController@managercompletemodule')->name('managercompletemodule');
Route::get('/tasklist/{id}','TaskController@tasklist')->name('tasklist');
Route::get('/taskassign/{id}','TaskassignController@edit')->name('taskassign');
Route::PATCH('/taskassignupdate/{id}','TaskassignController@update')->name('taskassignupdate');



//employee
Route::resource('employeetask', 'EmployeetaskController');
Route::get('/completetask','EmployeetaskController@completetask')->name('completetask');