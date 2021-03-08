<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
       return '<p>Nama: Gisanda Aliya Ramadhanty</p><br>
               <p>NIM: 1941720059</p><br>';
    }
}
