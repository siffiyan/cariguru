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
	Route::delete('manajemen_user/delete','Admin\ManajemenUserController@destroy');
	Route::get('manajemen_user/{id}/edit','Admin\ManajemenUserController@edit');
	Route::put('manajemen_user/update','Admin\ManajemenUserController@update');
	Route::post('manajemen_user','Admin\ManajemenUserController@store');

	Route::prefix('setting')->group(function () {

		Route::get('share_profit','Admin\ShareProfitController@index');
		Route::put('share_profit/{id}','Admin\ShareProfitController@update');

		Route::get('atur_diskon','Admin\AturDiskonController@index');
		Route::post('atur_diskon','Admin\AturDiskonController@store');
		Route::get('atur_diskon/{id}/edit','Admin\AturDiskonController@edit');
		Route::put('atur_diskon/update','Admin\AturDiskonController@update');
		Route::delete('atur_diskon/delete','Admin\AturDiskonController@destroy');

		Route::get('biaya_les','Admin\BiayaLesController@index');
		Route::post('biaya_les','Admin\BiayaLesController@store');
		Route::get('biaya_les/{id}/edit','Admin\BiayaLesController@edit');
		Route::put('biaya_les/update','Admin\BiayaLesController@update');
		Route::delete('biaya_les','Admin\BiayaLesController@destroy');

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
		Route::resource('blogAdmin', 'Admin\BlogController');
		Route::get('dashboard', 'Admin\BlogController@index');
		Route::delete('blog','Admin\BlogController@destroy');
		Route::patch('inactive', 'Admin\BlogController@inactive');
		Route::patch('active', 'Admin\BlogController@active');
		Route::put('approve/{id}', 'Admin\BlogController@approve');
		Route::put('reject/{id}', 'Admin\BlogController@reject');
	});

});

Route::prefix('tentor')->group(function () {

	Route::get('login','Tentor\AuthController@login');
	Route::post('login','Tentor\AuthController@login_action');
	Route::get('logout','Tentor\AuthController@logout');
	Route::get('ubah_password','Tentor\AuthController@ubah_password');
	Route::put('ubah_password_action','Tentor\AuthController@ubah_password_action');

	Route::get('dashboard','Tentor\DashboardController@index');
	Route::prefix('blog')->group(function() {
		Route::resource('blog', 'Tentor\BlogController');
		Route::get('index','Tentor\BlogController@index');
		Route::delete('delete','Tentor\BlogController@destroy');
	});

});

Route::prefix('dashboard')->group(function() {

	Route::view('index','landing_page.index2');
	
});
