<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {

	Route::get('dashboard','Admin\DashboardController@index');

	Route::get('manajemen_user','Admin\ManajemenUserController@index');

	Route::delete('manajemen_user/delete_admin','Admin\ManajemenUserController@delete_admin');

	Route::get('manajemen_user/edit_admin/{id}','Admin\ManajemenUserController@edit_admin');

	Route::put('manajemen_user/edit_action_admin','Admin\ManajemenUserController@edit_action_admin');

	Route::post('manajemen_user/tambah_user','Admin\ManajemenUserController@tambah_user');

});

Route::prefix('tentor')->group(function () {

});
