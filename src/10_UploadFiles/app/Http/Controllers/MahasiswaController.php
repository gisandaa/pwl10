<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $mahasiswas = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('Nim','asc')->paginate(3);
        
        return view('mahasiswas.index', ['mahasiswa'=>$mahasiswas, 'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create',['kelas'=> $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data 
        $request->validate([ 
        'Nim' => 'required', 
        'Nama' => 'required',
        'image' => 'required',
        'Kelas' => 'required', 
        'Jurusan' => 'required', 
        ]);
        $mahasiswas = new Mahasiswa;
        $mahasiswas->nim = $request->get('Nim');
        $mahasiswas->nama = $request->get('Nama');
        $mahasiswas->jurusan = $request->get('Jurusan');
        $mahasiswas->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        //fungsi eloquent untuk menambah data dg relasi belongsTo
        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('mahasiswas.index') 
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswas->image = $image_name;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa 
        $mahasiswas = Mahasiswa::with('kelas')->where('nim',$Nim)->first(); 
        return view('mahasiswas.detail', ['Mahasiswa'=> $mahasiswas]);
    }
    public static function nilai($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas','matakuliah')->where('Nim', $Nim)->first();
        return view('mahasiswas.nilai', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit 
        $mahasiswas = Mahasiswa::with('kelas')->where('nim',$Nim)->first(); 
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('mahasiswas','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data 
        $request->validate([ 
        'Nim' => 'required',
        'Nama' => 'required',
        'image' => 'required',
        'Kelas' => 'required', 
        'Jurusan' => 'required',
        ]);
        if($request->file('image')){
            if($mahasiswa->image != 'images/user.png' && file_exists(storage_path('app/public/' . $mahasiswa->image))){
                Storage::delete('public/' . $mahasiswa->image);
            }
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswa->image = $image_name;
        }

        //fungsi eloquent untuk mengupdate data inputan kita 
        $mahasiswas = Mahasiswa::with('kelas')->where('nim',$Nim)->first(); 
        $mahasiswas->nim = $request->get('Nim');
        $mahasiswas->nama = $request->get('Nama');
        $mahasiswas->jurusan = $request->get('Jurusan');
        $mahasiswas->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        
        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('mahasiswas.index') 
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data 
        Mahasiswa::find($Nim)->delete(); 
        return redirect()->route('mahasiswas.index') 
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
    public function cari($term)
    {
        $mahasiswas = Mahasiswa::where('Nama', 'LIKE', '%' . $term . '%')->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'));
    }
    public function cetak_pdf($nim){
        $Mahasiswa = Mahasiswa::with('kelas','matakuliah')->where('Nim', $nim)->first();
        $pdf = PDF::loadview('mahasiswas.cetak_pdf', compact('Mahasiswa'));
        return $pdf->stream();
    }
};
