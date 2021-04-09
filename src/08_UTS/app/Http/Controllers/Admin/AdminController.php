<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }
}
