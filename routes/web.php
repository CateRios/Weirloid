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

// Routas a las que sólo pueden entrar los usuarios autenticados
Route::group(['middleware' => 'auth'], function () {
    //Perfil
    Route::get('profile',function (){
        return view('profile');
    });

    Route::get('editProfile',function (){
        return view('editProfile');
    });

    Route::post('setProfile','ProfileController@setProfile');

//Mensajes
    Route::get('messagesList',function (){
        return view('messagesList');
    });
    Route::get('newMessage',function(){
        return view('newMessage');
    });
    Route::post('createMessage','MessagesController@createMessage');

    Route::get('messageDetail{id}', 'MessagesController@showDetails');

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
    // route for processing payment
    Route::post('paypal', 'PaymentController@payWithpaypal');
    // route for check status of the payment
    Route::get('status', 'PaymentController@getPaymentStatus');
});

//Catálogo
Route::get('catalog', function () {
    return view('catalog');
});

Route::get('/popsCatalog', 'PopsCatalogController@popsCatalog');

Route::get('mangaCatalog', 'MangaCatalogController@mangaCatalog');

Route::get('electronicsCatalog', 'ElectronicsCatalogController@electronicsCatalog');

Route::get('clothesCatalog', 'ClothesCatalogController@clothesCatalog');

//Detalle producto

Route::get('popDetail{id}', 'PopDetailController@showDetails');

Route::get('mangaDetail{id}', 'MangaDetailController@showDetails');

Route::get('electronicsDetail{id}', 'ElectronicsDetailController@showDetails');

Route::get('clothesDetail{id}', 'ClothesDetailController@showDetails');

//Carrito

Route::get('shoppingCart', 'ShoppingCartController@shoppingCart');

Route::post('addProduct', 'ShoppingCartController@addToCart');

// Servicios
Route::get('services', function(){
    return view('services');
});

// Sobre nosotros
Route::get('aboutUs', function(){
    return view('aboutUs');
});

// Servicios
Route::get('contact', function(){
    return view('contact');
});

/* ================= FUNCIONES ================= */

//Recuperar contraseña
Route::get('forgotPassword', function() {
    return view('auth.forgotPassword');
});

// Actualizar contraseña
Route::post('password/update', 'Auth\ResetPasswordController@reset')->name('password.update');

// Enviar email a Weirloid
Route::post('contact/email', 'Contact_controller@sendEmail');


