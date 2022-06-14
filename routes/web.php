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
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
  });

  Route::get('/admin/home', [
  //  'middleware' => 'role',
    'uses' => 'App\Http\Controllers\Admin\HomeController@index'
])->name('admin.home');

Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
  Route::get('logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



 // Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
  Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/admin/login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
  Route::post('/admin/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
  Route::get('/admin/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
//  Route::get('/llogin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  // Route::post('/llogin',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.lkogin');
  Route::namespace('Auth')->group(function(){
        
    //Login Routes
   // Route::get('/llogin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
   // Route::post('/llogin',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.lkogin');
    Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
   Route::post('/admin/login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout','LoginController@logout')->name('logout');
    Route::post('/admin/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


