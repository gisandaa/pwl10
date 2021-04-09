<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();
        return view('user.blog.index',compact('blogs'));
    }
    public function detail($id)
    {   
        $blog = Blog::findOrFail($id);
        return view('detail', compact('blog'));
    }
}
