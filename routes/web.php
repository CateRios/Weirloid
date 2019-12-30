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

//Catálogo

Route::get('/popsCatalog', 'popsCatalogController@popsCatalog');

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

Route::get('popDetail{id}', 'popDetailController@showDetails');

Route::get('mangaDetail', function(){
    return view('mangaDetail');
});

Route::get('electronicsDetail', function(){
    return view('electronicsDetail');
});

Route::get('clothesDetail', function(){
    return view('clothesDetail');
});

//Carrito

Route::get('shoppingCart', function(){
    return view('shoppingCart');
});

//Perfil
Route::get('profile',function (){
    return view('profile');
});

Route::get('editProfile',function (){
    return view('editProfile');
});

//Mensajes
Route::get('messagesList',function (){
    return view('messagesList');
});

Route::get('messageDetail',function (){
    return view('messageDetail');
});

//Pedidos
Route::get('ordersList',function (){
    return view('ordersList');
});
Route::get('orderDetail',function (){
    return view('orderDetail');
});

//Pago
Route::get('paymentPlatform',function (){
    return view('paymentPlatform');
});
