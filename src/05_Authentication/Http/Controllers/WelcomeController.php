<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function halo(){
        Route::get('/halo', function () {
            return view('coba.hello', ['nim' => '1941720059 dari welcome controller']);
        });
    }
    public function artikel($id){
        return 'Halaman artiker dengan ID: '.id;
    }
}
