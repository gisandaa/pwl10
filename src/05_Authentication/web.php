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
    return "Hello";
});
Route::get('/about', function () {
    return 'Gisanda Aliya Ramadhanty <br> 1941720059';
});
Route::get('/articles/{id}', function ($id) {
    //return 'User'.$id;
});

Route::get('/hello', function () {
    //return view('hello', ['nim' => '1941720059']);
});

use Illuminate\Support\Facades\View;
Route::get('/hello', function () {
    //return view('coba.hello', ['nim' => '1941720059']);
});
Route::get('/halo', [WelcomeController::Class, 'hello']);
   
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
