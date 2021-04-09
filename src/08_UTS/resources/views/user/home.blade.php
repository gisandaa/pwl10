@extends("layouts.app")
@section("contents")
<div class="container">
  <div class="row">
    <div class="col-md-2">
      <h3>Menu</h3>
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
        <div class="card-header">Dashboard {{ $user->name }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <p><strong>Selamat datang {{ $user->name }}!</strong> Anda telah melakukan login sebagai {{ $user->role }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="padding-top: 30px;">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Informasi Akun</div>

        <div class="card-body">
          <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
          {{-- <form action="/home/update" method="POST"> --}}
            @csrf
            @method('POST')
            <div class="form-group">
              <input type="hidden" name="id" value="{{ $user->id }}"> <br />
              <label class="font-weight-bold">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama Lengkap">
              @error('name')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Email</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="email"
                value="{{ old('email', $user->email) }}" placeholder="Masukkan Email">
              @error('email')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Akun Dibuat Tanggal</label>
              <input readonly type="text" class="form-control @error('created_at') is-invalid @enderror"
                name="created_at" value="{{ old('email', $user->created_at) }}" placeholder="Dibuat Tanggal">
              @error('created_at')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
          

          <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
        </form>
          {{-- </form> --}}
          {{-- <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="{{ $user->id }}"> <br />
          Nama <input type="text" required="required" name="nama" value="{{ $user->name }}"> <br />
          Email <input type="text" required="required" name="email" value="{{ $user->email }}"> <br />
          <input type="submit" value="Simpan Data">
          </form> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection