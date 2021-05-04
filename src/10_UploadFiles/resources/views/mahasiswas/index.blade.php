@extends('mahasiswas.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="mx-auto pull-right">
            <div class="float-left">
                <form action="{{ route('mahasiswas.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search Nama Mahasiswa" id="term">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Mahasiswa">
                                <span class="fas fa-search">Search</span>
                            </button>
                        </span>
                        <a href="{{ route('mahasiswas.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt">Refresh</span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswa as $Mahasiswa)
    <tr>
        <td>{{ $Mahasiswa->Nim }}</td>
        <td>{{ $Mahasiswa->Nama }}</td>
        <td><img src="{{ 'storage/' . $Mahasiswa->foto }}" alt="" srcset=""></td>
        <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
        <td>{{ $Mahasiswa->Jurusan }}</td>
        <td>
            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-warning" href="{{  route('mahasiswas.nilai', $Mahasiswa->Nim) }}">Nilai</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex">
    {{ $paginate->appends(request()->term)->links('pagination::bootstrap-4') }}
</div>
@endsection