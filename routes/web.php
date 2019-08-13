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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/upload', 'HomeController@saveMedCert')->name('upload');
Route::post('/avatar', 'AvatarController@store');
Route::put('/user/', 'UserController@update');

Route::group(['prefix'=>'/admin'], function () {
    Route::get('/home', 'AdminController@index')->name('home');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/announcements', 'Admin\AnnouncementController')->only(['index', 'store']);
    Route::get('/user/approve/{id}', 'Admin\UserController@accept');
    Route::get('/user/reject/{id}', 'Admin\UserController@reject');
});

Route::get('/user/medcert/{id}', 'AssetController@serveImage');
