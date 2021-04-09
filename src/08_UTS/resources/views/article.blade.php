@extends("layouts.app")
@section("contents")
  <!-- BLOG -->
  <section class="blog section-padding">
    <div class="container">
      <div class="row">

        <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">

          <h1 class="mb-4" data-aos="fade-up">Digital Trend</h1>
        </div>
        @forelse ($blogs as $blog)
        <div class="col-lg-12 col-md-12 col-12 mb-4">
          <a href="{{ url('article/'.$blog->id) }}">
            <h4 class="blog-category text-info">{{ $blog->title }}</h4>
          </a>
          <p>Penulis : {{ $blog->penulis}}</p>
          <p>Tanggal Berita : {{ $blog->tanggal}}</p>
          <br>
          <div class="blog-header" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ url('article/'.$blog->id) }}">
              <img src="{{asset('storage/app/public/blogs').'/'.$blog->image}}" class="img-fluid" alt="blog header">
            </a>
          </div>
          <br>
        </div>
        <br>
        <br>
        @empty
        <div class="col-lg-12 col-md-12 col-12 mb-4">
          <div class="alert alert-danger">
            Data Blog belum Tersedia.
          </div>
        </div>
        @endforelse



      </div>
    </div>
  </section>
@endsection