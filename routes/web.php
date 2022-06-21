<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
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
// Route::post('/login', [LoginController::class, 'authenticate']);

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'create']);

// // Route::get('register', [RegisterController::class, 'index'])->name('register');
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::resource('student', StudentController::class);
Route::resource('book', BookController::class);
// Route::get('index', [CatalogController::class,'index']);


// Route::get('/admindashboard', function () {
//     return view ('dashboard.admin.dashboard');
// })->middleware('admin');

// Route::resource('/admindashboard',)->middleware('admin');

Route::resource('/dashboard/type',AdminTypeController::class)->except('show')->middleware('admin');
Route::get('print_student', [StudentController::class, 'print_student'])->name('print_student');
// Route::get('/',function(){
//     Auth::logout();
//     return redirect('/');
// });

// Route::group(['middleware' =>'auth','is_admin:1'], function(){
//    Route::get('/admin-page','DashboardUser@adminpage')->name('admin-page');
// });

// Route::group(['middleware' =>'auth','is_admin:0,1'], function(){
//     Route::get('/home','DashboardUser@index');
//  });

//  Route::group(['middleware' =>'auth','is_admin:0'], function(){
//     Route::get('/student-page','DashboardUser@studentpage')->name('student-page');
//  });
 
