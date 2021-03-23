<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    function News()
    {
        return view('news');
        // return redirect('https://www.educastudio.com/news');
    }
}
