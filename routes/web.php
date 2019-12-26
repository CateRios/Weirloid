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

//Perfil
Route::get('profile',function (){
    return view('profile');
});
