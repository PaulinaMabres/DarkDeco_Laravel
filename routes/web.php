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

Route::get('/',function(){ return view('home');})->name('anonimo'); /* Anonimo = La ruta no requiere login */
Route::get('/home', 'HomeController@index')->name('home');

// Rutas de autorizacion
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login'); // showLoginForm no está en el LoginController ??? Redirecciona a la vista de Login
Route::post('login', 'Auth\LoginController@login'); // login no está LoginController ??? Loguea al usuario y redirecciona al home
Route::post('login/validateData', 'Auth\LoginController@ValidateLoginData'); // Le manda el JSON a login.js que se usa en login.blade
Route::post('logout', 'Auth\LoginController@logout')->name('logout'); // logout no está en LoginController ??? Logout y redirecciona al home

// Registration Routes...
Route::get('register', 'Auth\RegisterController@formularioDeRegistro')->name('register'); // Busca datos de preguntas secretas y ciudades y redirige a la vista auth.register
Route::post('register', 'Auth\RegisterController@register'); // register no está en RegisterController ??? Registra al usuario y redirige al home
Route::post('register/validateData', 'Auth\RegisterController@ValidateRegisterData'); // Le manda el JSON a register.js que se usa en register.blade

// Password Reset Routes...
// Route::get('/recuperarpassword', 'RecuperarPasswordController@index');
// Route::post('/recuperarpassword', 'RecuperarPasswordController@recuperar')->name('recuperarpassword');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset', 'Auth\ForgotPasswordController@mostrarFormularioDeReinicio')->name('password.request'); // Redirige a la vista recuperarpassword
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::post('password/reset/preguntaSecreta', 'Auth\ForgotPasswordController@reiniciarPassword')->name('password.reiniciar'); // Guarda nueva contraseña y redirige al home
Route::post('password/reset/validateData','Auth\ForgotPasswordController@ValidateRecuperarPasswordData'); // Le manda el JSON a recuperarPassword.js que se usa en recuperarpassword.blade
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); // Debe ser predeterminado porque no existe pero es necesario
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); // Debe ser predeterminado porque no existe pero es necesario

// Perfil
Route::get('/perfil', 'PerfilController@index')->name('perfil'); // Busca los datos del perfil y redirige a la vista perfil
Route::get('/perfil/editar', 'PerfilController@editarPerfil')->name('editarPerfil'); // Busca los datos del perfil y redirige a la vista editarperfil
Route::post('/perfil/editar/validateData','PerfilController@ValidateEditarPerfilData'); // Le manda el JSON a editarperfil.js que se usa en editarperfil.blade
Route::post('/perfil/editar', 'PerfilController@update')->name('updatePerfil'); // Actualiza el perfil en la BD y redirige a la ruta perfil
Route::get('/perfil/editarcontraseña', 'PerfilController@editarContraseña')->name('editarContraseña'); // Busca los datos de la contraseña y redirige a la vista editarcontraseña
Route::post('/perfil/editarContraseña/validateData','PerfilController@validateEditarContraseñaData'); // Le manda el JSON a editarContraseña.js que se usa en editarContraseña.blade
Route::post('/perfil/actualizarcontraseña', 'PerfilController@actualizarContraseña')->name('actualizarContraseña'); // Actualiza la contraseña en la BD y redirige a la ruta editarcontraseña
Route::post('/perfil/actualizarImagen', 'PerfilController@actualizarImagen')->name('actualizarImagen'); // Actualiza la imagen en la BD y redirige a la ruta perfil

// Preguntas frecuentes
Route::get('/faq', 'FAQsController@index'); // Crea array de preguntas y respuestas frecuentes y redirige a la vista faq

// Rutas de productos
Route::get('/products','ProductController@index'); // Lista completa de productos, redirige a la vista products
Route::get('/products/{category_id?}', 'ProductController@index'); // Lista filtrada (por categoría) de productos, redirige a la vista products
Route::get('/product/{id}', 'ProductController@show'); // Muestra un solo producto, redirige a la vista product
Route::get('/addProduct', 'ProductController@create')->middleware('auth'); // Crea un registro vacio en la BD y redirige a addEditProduct
Route::post('addProduct', 'ProductController@store')->middleware('auth'); // Valida los datos y guarda el registro en la BD y redirige a products
Route::get('/deleteProduct/{id}','ProductController@destroy')->middleware('auth'); // Borrar el registo pedido (id) de la BD y redirige a products
Route::get('/editProduct/{id}', 'ProductController@edit')->middleware('auth'); // Busca el producto en la BD y redirige a addEditProduct
Route::post('editProduct/{id}', 'ProductController@update')->middleware('auth'); // Valida los datos y actualiza el registro en la BD y redirige a products
Route::get('/searchProducts', 'ProductController@search'); // Lista filtrada (resultado de la búsqueda) de productos, redirige a la vista products
// Route::post('featuredProducts', 'ProductController@featured'); // Le manda el JSON a home.js que se usa en home.blade

// Rutas de carrito
Route::get('/addToCart', 'CartController@store')->middleware('auth'); // Agrega un producto al carrito con status 0 y redirige a products
Route::get('/delete/{id}', 'CartController@destroy')->middleware('auth'); //Borramos productos del carrito.
Route::get('/myCart', 'CartController@index')->middleware('auth')->name('myCart'); //Mostramos el carrito abierto.
Route::post('/cartClose', 'CartController@cartClose')->middleware('auth'); // Cierra el carrito
Route::get('/history', 'CartController@history')->middleware('auth')->name('history'); // Muestra el historial de compras
