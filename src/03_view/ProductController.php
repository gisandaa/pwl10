<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function product1()
    {
        return view('product', [
            'name' => 'Gisanda',
            'occupation'=> 'Student at Polinema'
            ]);
    }
    function hello1()
    {
        return view('coba.hello', ['name' => 'Andika']);
    }
    // function StoryBooks()
    // {
    //     return redirect('https://www.educastudio.com/category/riri-story-books');
    // }
    // function KidSong()
    // {
    //     return redirect('https://www.educastudio.com/category/kolak-kids-songs');
    // }
}
