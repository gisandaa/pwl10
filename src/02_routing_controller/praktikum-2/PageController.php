<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
       return 'Selamat datang';
    }
    public function about()
    {
      return 'Gisanda Aliya Ramadhanty <br> 1941720059';
    }
    public function articles()
    {
       return 'Article';
    }
}
