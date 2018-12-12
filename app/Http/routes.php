<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home...
Route::get('/', [
	'uses' => 'DefaultController@index',
	'as'   => 'home'
]);

//Search phones entries...
Route::post('buscar-telefono/{i}', [
	'uses' => 'SearchController@search',
	'as'   => 'sch'
]);

//View phone entry...
Route::get('buscar-telefono/{phone}/{i}', [
	'uses' => 'SearchController@view',
	'as'   => 'phView'
]);

// Authentication routes...
Route::get('registrarse', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
]);
Route::post('registrarse', 'Auth\AuthController@postLogin');
Route::get('cerrar-sesion', [
	'uses' => 'Auth\AuthController@getLogout',
	'as'   => 'logout'
]);

Route::group(['middleware' => 'auth'], function () {

	// Admin panel...
	Route::get('administracion/panel', [
		'uses' => 'AdminController@panel',
		'as'   => 'panel'
	]);

	// Config profile...
	Route::get('administracion/panel/configuracion', [
		'uses' => 'AdminController@config',
		'as'   => 'config'
	]);
	Route::post('administracion/panel/configuracion', 'AdminController@postConfig');

	// Admin users...
	Route::get('administracion/panel/companias', [
		'uses' => 'UsersController@company',
		'as'   => 'comp'
	]);

	// Admin users renew...
	Route::get('administracion/panel/companias/renovar/{i}', [
		'uses' => 'UsersController@renew',
		'as'   => 'renew'
	]);

	// Admin users delete...
	Route::get('administracion/panel/companias/eliminar/{i}', [
		'uses' => 'UsersController@delete',
		'as'   => 'del'
	]);

	// Admin users add...
	Route::get('administracion/panel/companias/nueva', [
		'uses' => 'UsersController@create',
		'as'   => 'addUs'
	]);
	Route::post('administracion/panel/companias/nueva', 'UsersController@postCreate');

	//Admin phones...
	Route::get('administracion/panel/telefonos', [
		'uses' => 'DefaultController@adminPhones',
		'as'   => 'phones'
	]);

	//Admin phones edit...
	Route::get('administracion/panel/telefonos/actualizar/{i}', [
		'uses' => 'DefaultController@update',
		'as'   => 'upPh'
	]);
	Route::post('administracion/panel/telefonos/actualizar/{i}', 'DefaultController@postUpdate');

	//Admin phones delete...
	Route::get('administracion/panel/telefonos/eliminar/{i}', [
		'uses' => 'DefaultController@delete',
		'as'   => 'delPh'
	]);

	//Admin phones add...
	Route::get('administracion/panel/telefonos/nuevo', [
		'uses' => 'DefaultController@create',
		'as'   => 'addPh'
	]);
	Route::post('administracion/panel/telefonos/nuevo', 'DefaultController@postCreate');

	Route::post('subir-imagenes/{i}',[
		'uses' => 'DefaultController@store_imgs',
		'as'   => 'img'
	]);

	Route::get('modelos/{i}', 'DefaultController@getBModels');

	//Admin phones new brand...
	Route::post('nueva-marca', [
		'uses' => 'PhonesController@brand',
		'as'   => 'newPhoneBrand'
	]);

	//Admin phones new brand model...
	Route::post('nuevo-modelo', [
		'uses' => 'PhonesController@bModel',
		'as'   => 'newBrandModel'
	]);
});