@extends("layouts.app")

@section("contents")
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h3>Menu</h3>
            <p>Lorem ipsum dolor sit ame.</p>
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
                <div class="card-header">Edit Artikel</div>

                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control" name="image">
                            
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $blog->title) }}" placeholder="Masukkan Judul Blog">

                            <!-- error message untuk title -->
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Penulis</label>
                            <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ old('penulis', $blog->penulis) }}" placeholder="Masukkan Penulis">
                        
                            <!-- error message untuk title -->
                            @error('penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $blog->tanggal) }}" placeholder="Masukkan Tanggal">
                        
                            <!-- error message untuk title -->
                            @error('tanggal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">KONTEN</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                rows="5"
                                placeholder="Masukkan Konten Blog">{{ old('content', $blog->content) }}</textarea>

                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection