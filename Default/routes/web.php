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

Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);

Route::get('{slug}.html',[
    'uses' => 'HomeController@show',
    'as' => 'blogdetail'
]);

//login controller
//
Route::get('/login',[
		'uses' => 'AuthController@login',
		'as' =>'Login'
	]);

Route::post('/login',[
		'uses' => 'AuthController@postlogin',
		'as' => 'postLogin'
	]);
//register
//
Route::get('/register',[
		'uses' => 'AuthController@register',
		'as' => 'Register'
	]);

Route::post('/register',[
		'uses' => 'AuthController@postregister',
		'as' => 'postRegister'
	]);
//logout controller
//
Route::get('/logout','AuthController@logout');

//forgot controller
//

Route::get('forgotpass', [
		'uses' => 'AuthController@forgotpass',
		'as' => 'Forgotpass'
	]);

Route::post('forgotpass', [
		'uses' => 'AuthController@postforgotpass',
		'as' => 'postForgotpass'
	]);

Route::get('reset/{token}', [
		'uses' => 'AuthController@resetpassword',
		'as' => 'Resetpass'
	]);

Route::post('reset', [
		'uses' => 'AuthController@postresetpassword',
		'as' => 'postResetpass'
	]);
//change lang
//

Route::post('language-chooser', 'LanguageController@changeLanguage');

Route::post('language',['before' => 'csrf', 'as' => 'language-chooser', 'uses' => 'LanguageController@changeLanguage']);

/**
 * Route for admin
 */

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});