@extends("layouts.app")
@section("contents")
  <!-- BLOG DETAIL -->
  <section class="project-detail section-padding-half">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto col-md-10 col-12 text-center">
          <h4 class="blog-category text-info">{{ $blog->title }}</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-2 text-center">
          <?php echo html_entity_decode($blog->content); ?>
        </div>
      </div>
      <p>Penulis : {{ $blog->penulis}}</p>
      <p>Tanggal Berita : {{ $blog->tanggal}}</p>
      <br>
    </div>
  </section>
@endsection