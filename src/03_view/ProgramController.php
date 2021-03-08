<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    function program1()
    {
        return view('program', [
            'project' => '"web sistem informasi buku"',
        ]);
    }
    // function magang()
    // {
    //     return redirect('https://www.educastudio.com/program/magang');
    // }
    // function kunjungan()
    // {
    //     return redirect('https://www.educastudio.com/program/kunjungan-industri');
    // }
}
