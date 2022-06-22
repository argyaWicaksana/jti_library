<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\Controller;


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

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about', 'about');
    Route::get('/contactus', 'contactus');
    Route::get('/login', 'login');
    Route::get('/register', 'register');
});


Route::controller(DashboardController::class)->group(function () {
    Route::get('/studentdashboard', 'dashboard');
    Route::get('/cart', 'cart');
    Route::get('/account', 'account');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admindashboard', 'dashboard');
    Route::get('/admintransaction', 'transaction');
});

Auth::routes();
 //Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
 

 //Route::get('/register', [RegisterController::class, 'index'])->name('register');
 Route::post('/register', [RegisterController::class, 'create'])->name('register');

 
Route::resource('student', StudentController::class);
Route::resource('book', BookController::class);

Route::resource('/dashboard/type',AdminTypeController::class)->except('show')->middleware('admin');
Route::get('print_student', [StudentController::class, 'print_student'])->name('print_student');
Route::get('print_books', [BookController::class, 'print_books'])->name('print_books');
