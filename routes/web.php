<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTypeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;

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

Auth::routes();
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);


Route::get('/admindashboard', function () {
    return view ('dashboard.admin.dashboard');
})->middleware('admin');

Route::resource('/admindashboard',)->middleware('admin');

Route::resource('/dashboard/type',AdminTypeController::class)->except('show')->middleware('admin');
Route::get('/student/print_pdf', [StudentController::class,'print_pdf'])->name('print_pdf');
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
 