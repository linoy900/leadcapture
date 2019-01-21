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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create/leads','LeadsController@create');
Route::post('/create/leads','LeadsController@store');
Route::post('/create/lead-upload','LeadsController@uploadfile');
Route::post('/create/lead-upload','LeadsController@uploadfile');
Route::get('/leads', 'LeadsController@leadslist');
Route::get('/edit/leads/{id}','LeadsController@editleads');
Route::post('/create/lead-auto-submit','LeadsController@autosubmit');




Route::get('/create/user','UserController@create');
Route::post('/create/user','UserController@userregister');
Route::get('/user-list','UserController@userlist');
Route::get('/edit/user/{id}','UserController@editprofile');
Route::post('/edit/user/{id}','UserController@updateprofile');
