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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::post('password/update', 'Auth\ResetPasswordController@reset')->name('password.update');

// Routas a las que sólo pueden entrar los usuarios autenticados
Route::group(['middleware' => 'auth'], function () {

});

//Recuperar contraseña
Route::get('forgotPassword', function(){
    return view('auth.forgotPassword');
});


//Catálogo

Route::get('popsCatalog', function(){
    return view('popsCatalog');
});

Route::get('mangaCatalog', function(){
    return view('mangaCatalog');
});

Route::get('electronicsCatalog', function(){
    return view('electronicsCatalog');
});

Route::get('clothesCatalog', function(){
    return view('clothesCatalog');
});

//Detalle producto

Route::get('popDetail', function(){
    return view('popDetail');
});

//Carrito

Route::get('shoppingCart', function(){
    return view('shoppingCart');
});



