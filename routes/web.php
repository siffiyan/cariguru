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

	Route::prefix('manajemen_user')->group(function () {

		Route::get('','Admin\ManajemenUserController@index');

		Route::delete('delete_admin','Admin\ManajemenUserController@delete_admin');

		Route::get('edit_admin/{id}','Admin\ManajemenUserController@edit_admin');

		Route::put('edit_action_admin','Admin\ManajemenUserController@edit_action_admin');

		Route::post('tambah_user','Admin\ManajemenUserController@tambah_user');

	});

	Route::prefix('setting')->group(function () {

		Route::get('share_profit','Admin\SettingController@share_profit');

		Route::put('share_profit/edit/{id}','Admin\SettingController@edit_share_profit');

		Route::get('atur_diskon','Admin\SettingController@atur_diskon');

		Route::post('create_atur_diskon','Admin\SettingController@create_atur_diskon');

		Route::get('get_detail_diskon/{id}','Admin\SettingController@get_detail_diskon');

		Route::put('edit_atur_diskon','Admin\SettingController@edit_atur_diskon');

		Route::delete('delete_atur_diskon','Admin\SettingController@delete_atur_diskon');

	});	

});
