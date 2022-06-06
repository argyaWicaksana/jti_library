<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', function (){
    return view ('home.index');
});

Route::get('/main', function (){
    return view ('home.layout.main');
});

Route::get('/cart', function (){
    return view ('home.cart');
});

Route::get('/about', function (){
    return view ('home.about');
});

Route::get('/contactus', function (){
    return view ('home.contactus');
});

Route::get('/login', function (){
    return view ('login');
});

Route::get('/register', function (){
    return view ('register');
});