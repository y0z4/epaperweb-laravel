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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home/home');
});
// Route::get('/login', function () {
// return view('login/login');
// });

Auth::routes();

// Route::get('/login', 'LoginController@index')->name('login');
// Route::get('/login',array('uses'=>'Auth\LoginController@showLogin'));
// Route::post('/login','Auth\LoginController@postLogin');

Route:: post('/login', 'LoginController@doLogin');
Route:: post('/register', 'Auth\RegisterController@signup');
Route::get('/dashboard', 'DashboardController@index');
Route::post('/user/{any}', 'UserController@index');
Route::get('/user/{any}', 'UserController@index');
Route::get('/logout', 'LoginController@logout');

// Route::get('/login/{provider}', 'LoginController@auth')
//      ->where(['provider'=>'facebook']);
// Route::get('/login/{provider}/callback', 'LoginController@login')
//      ->where(['provider'=>'facebook']);

// Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
// Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/{provider}', 'LoginController@login');
Route::get('auth/facebook/callback', 'LoginController@callbackfb');
Route::get('auth/google/callback', 'LoginController@callbackgoogle');

// Route:: get('/login/{provider}', 'LoginController@login');
// Route:: get('/login/callbackfb', 'LoginController@callbackfb');

// Route::get('/home_user', 'AuthController@index');
// Route::get('/login', 'AuthController@login');
// Route::post('/loginPost', 'AuthController@loginPost');
// Route::get('/register', 'AuthController@register');
// Route::post('/registerPost', 'AuthController@registerPost');
// Route::get('/logout', 'AuthController@logout');
