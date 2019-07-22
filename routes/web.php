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
Route::get('/recuperarpassword', 'RecuperarPasswordController@index');
Route::post('/recuperarpassword', 'RecuperarPasswordController@recuperar')->name('recuperarpassword');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset', 'Auth\ForgotPasswordController@mostrarFormularioDeReinicio')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::post('password/reset/preguntaSecreta', 'Auth\ForgotPasswordController@reiniciarPassword')->name('password.reiniciar');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/faq', 'FaqsController@index');

// Rutas de productos
Route::get('/products/{category_id?}', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/addProduct', 'ProductController@create');
Route::post('addProduct', 'ProductController@store');
Route::get('/deleteProduct/{id}','ProductController@destroy');
Route::get('/editProduct/{id}', 'ProductController@edit');
Route::post('editProduct/{id}', 'ProductController@update');


Route::get('/perfil', 'PerfilController@index')->name('perfil');
Route::get('/perfil/editar', 'PerfilController@editarPerfil')->name('editarPerfil');
Route::post('/perfil/editar', 'PerfilController@update')->name('updatePerfil');
Route::get('/perfil/editarcontraseña', 'PerfilController@editarContraseña')->name('editarContraseña');
Route::post('/perfil/actualizarcontraseña', 'PerfilController@actualizarContraseña')->name('actualizarContraseña');