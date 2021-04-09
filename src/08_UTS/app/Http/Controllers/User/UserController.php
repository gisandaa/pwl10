<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('user.home', compact('user'));
    }

    public function update(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'name'     => $request->name,
            'email'     => $request->email,
        ]);
        $user = Auth::user();
        return view('user.home', compact('user'));
    }
}
