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
//     return view('home/home');
// });
Route::get('/', 'HomeController@index');
Route::get('/highlight/{any}', 'DetailNonController@index');
Route::get('/blog/', 'BlogController@index');
Route::get('/epaper/{id}/{url}', 'EpaperController@index',['middleware'=>'cors',function(){
    return['status'=>'success'];
}])->name('epaper');
Route::get('/epapertopskor/{id}/{url}', 'Epaper2Controller@index');
Route::get('/nonsubs/{any}', 'DetailNonSubsController@index');
Route::get('/dashboard/payment','PaymentController@index');
Route::get('/subsuccess','SubsemailController@index');
Route::get('/thankscart','ThankscartController@index')->name('thankscart');
Route::get('/iklan','IklanController@index');
Route::get('/konfirmasi/{invoice}','KonfirmasiController@index');
Route::get('/thankskonfirmasi','KonfirmasiController@thanks');
Route::get('mail/send', 'MailController@send');

Auth::routes();

Route:: post('/login', 'LoginController@doLogin');
Route:: post('/register', 'Auth\RegisterController@signup');
// Route:: get('/register', 'Auth\RegisterController@index');
Route:: get('/register',array('as'=>'register','uses'=>'Auth\RegisterController@province'));
Route:: get('/register/cities/{id}', array('as'=>'register.cities','uses'=>'Auth\RegisterController@cities'));
Route:: get('/dashboard',array('as'=>'edit','uses'=>'DashboardController@province'));
Route:: get('/dashboard/cities/{id}', array('as'=>'edit.cities','uses'=>'DashboardController@cities'));
Route::get('/dashboard', 'DashboardController@index');
Route::post('/edit/editaction', 'DashboardController@editaction');
Route::post('/subsemail','SubsemailController@subsemail');
Route::post('/iklan','IklanController@iklan');
Route::post('/dashboard/payment','PaymentController@subs');
Route::post('/user/{any}', 'UserController@index');
Route::post('/konfirmasi','KonfirmasiController@konfirmasi');
Route::get('/user/{any}', 'UserController@index');
Route::get('/logout', 'LoginController@logout');
Route::get('/laman/{any}','LamanController@index');

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
