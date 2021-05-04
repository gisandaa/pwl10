<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable; 
use Illuminate\Notifications\Notifiable; 
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class Mahasiswa extends Model //Definisi Model 
{ 
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas 
    protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey 
    /** 
    * The attributes that are mass assignable.
    * 
    * @var array 
    */ 
    protected $fillable = [ 
        'Nim', 
        'Nama', 
        'image',
        'kelas_id', 
        'Jurusan', 
     ];
     public function kelas()
     {
         return $this->belongsTo(Kelas::class);
     }
     public function matakuliah(){
        return $this->belongsToMany(Matakuliah::class,'mahasiswa_matakuliah','mahasiswa_id','matakuliah_id')->withPivot('nilai');
    }
     };