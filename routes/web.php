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
//
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){ return view('home');})->name('anonimo'); /* Anonimo = La ruta no require login */

// Route::get('home',function(){
//   return view('home');
// });
Route::get('/recuperarpassword', 'RecuperarPasswordController@index');
Route::post('/recuperarpassword', 'RecuperarPasswordController@recuperar')->name('recuperarpassword');

Route::get('/faq', 'FaqsController@index');
Route::get('/products', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');




Route::get('/home', 'HomeController@index')->name('home');


// Rutas de autorizacion
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@formularioDeRegistro')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::get('password/reset', 'Auth\ForgotPasswordController@mostrarFormularioDeReinicio')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::post('password/reset/preguntaSecreta', 'Auth\ForgotPasswordController@reiniciarPassword')->name('password.reiniciar');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


