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

// Route::get('/', function () {
//     return view('layout.master');
// });

Route::prefix('admin')->group(function () {

	Route::get('dashboard','Admin\DashboardController@index');
	Route::get('manajemen_user','Admin\ManajemenUserController@index');
	Route::delete('manajemen_user/delete_admin','Admin\ManajemenUserController@delete_admin');
	Route::get('manajemen_user/edit_admin/{id}','Admin\ManajemenUserController@edit_admin');
	Route::put('manajemen_user/edit_action_admin','Admin\ManajemenUserController@edit_action_admin');
	Route::post('manajemen_user/tambah_user','Admin\ManajemenUserController@tambah_user');

	Route::prefix('pembelajaran')->group(function () {
		Route::get('jenjang','Admin\JenjangController@index');
		Route::delete('jenjang','Admin\JenjangController@destroy');
		Route::post('jenjang','Admin\JenjangController@store');
		Route::get('jenjang/edit/{id}','Admin\JenjangController@edit');
		Route::put('jenjang/update','Admin\JenjangController@update');

		Route::get('kurikulum','Admin\kurikulumController@index');
		Route::delete('kurikulum','Admin\kurikulumController@destroy');
		Route::post('kurikulum','Admin\kurikulumController@store');
		Route::get('kurikulum/edit/{id}','Admin\KurikulumController@edit');
		Route::put('kurikulum/update','Admin\kurikulumController@update');

		Route::get('mapel','Admin\mapelController@index');
		Route::delete('mapel','Admin\mapelController@destroy');
		Route::post('mapel','Admin\mapelController@store');
		Route::get('mapel/edit/{id}','Admin\mapelController@edit');
		Route::put('mapel/update','Admin\mapelController@update');

		Route::get('mapel/list_jenjang','Admin\mapelController@list_jenjang');
		Route::get('mapel/list_kurikulum','Admin\mapelController@list_kurikulum');
	});

	Route::prefix('blog')->group(function () {

	});

});

Route::prefix('tentor')->group(function () {

});
