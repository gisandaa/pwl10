@extends('mahasiswas.layout')
@section('content')
<div class="row justify-content-center">
<div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
    <div class="col-sm-4">
        <h2>KARTU HASIL STUDI</h2>
    </div>
</div>
@if($Mahasiswa)
<p><strong>Nim&nbsp;: </strong>{{ $Mahasiswa->Nim }}</p>
<p><strong>Nama&nbsp;: </strong>{{ $Mahasiswa->Nama}}</p>
<p><strong>Kelas&nbsp;: </strong>{{ $Mahasiswa->Kelas->nama_kelas }}</p>
@else
<h2>Belum ada data!</h2>
@endif
<table class="table table-bordered">
    <tr>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nilai</th>
    </tr>
    @foreach ($Mahasiswa->matakuliah as $mhs)
    <tr>
        <td>{{ $mhs->nama_matkul }}</td>
        <td>{{ $mhs->sks }}</td>
        <td>{{ $mhs->semester }}</td>
        <td>{{ $mhs->pivot->nilai}}</td>
		
    </tr>
    @endforeach
</table>
<div class="row justify-content-end">
    <a href="{{ route('mahasiswas.index') }}" class="btn btn-danger">Kembali</a>
</div>
@endsection