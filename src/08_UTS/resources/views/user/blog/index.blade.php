@extends("layouts.app")
@section("contents")
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h3>Profil</h3>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">Buat Artikel</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Buat Artikel</div>

                <div class="card-body">
                    <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">TAMBAH ARTIKEL</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">ISI</th>
                                <th scope="col">PENULIS</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                            <tr>
                                <td class="text-center">
                                    <img src="{{asset('storage/app/public/blogs').'/'.$blog->image}}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{!! $blog->content !!}</td>
                                <td>{{ $blog->penulis }}</td>
                                <td>{!! $blog->tanggal !!}</td>
                                <td>{!! $blog->gambar !!}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                        <a href="{{ route('blog.edit', $blog->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Artikel belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection