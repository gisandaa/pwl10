<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/kontak', function () {
    return view('kontak');
});


Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/program', function () {
    return view('program');
});

Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('article');
Route::get(
    '/article/{id}',
    [App\Http\Controllers\ArticleController::class, 'detail']
)->name('profile');

Auth::routes();
Route::resource('blog', BlogController::class);

// Route::resource('user', UserController::class);
Route::middleware(['auth'])->group(function () {
 
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index']);
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('/user', [App\Http\Controllers\User\UserController::class, 'index'])->name('user');
        Route::post('/user', [App\Http\Controllers\User\UserController::class, 'update'])->name('update');
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
 
});