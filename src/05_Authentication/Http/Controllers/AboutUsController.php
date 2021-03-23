<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function about()
    {
        return redirect('https://www.educastudio.com/about-us');
    }
}
