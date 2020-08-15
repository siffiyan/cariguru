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
		Route::resource('blog', 'Admin\BlogController');
		Route::get('dashboard', 'Admin\BlogController@index');
		Route::delete('blog','Admin\BlogController@destroy');
		Route::post('inactive', 'Admin\BlogController@inactive');
		Route::post('active', 'Admin\BlogController@active');
	});

});

Route::prefix('tentor')->group(function () {

});

Route::prefix('dashboard')->group(function() {
	Route::view('index','landing_page.index');
});
