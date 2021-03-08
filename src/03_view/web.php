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

Route::get('/home', function () {
    return view'home';
});
Route::get('/about', function () {
    return view'about-us';
});
Route::get('/product', function () {
    return view'product';
});
Route::get('/program', function () {
    return view'program';
});
Route::get('/news', function () {
    return view'news';
});
Route::get('/contact', function () {
    return view'contact-us';
});

Route::get('/hello', function () {
    //return view('hello', ['nim' => '1941720059']);
});

use Illuminate\Support\Facades\View;
Route::get('/hello', function () {
    //return view('coba.hello', ['nim' => '1941720059']);
});
Route::get('/halo', [WelcomeController::Class, 'hello']);
   