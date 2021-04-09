@extends("layouts.layout")
@section("contents")
    <section class="testimonial section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-5 col-12">
                    <div class="contact-image" data-aos="fade-up">

                        <img src="{{ asset('public/images/female-avatar.png') }}" class="img-fluid" alt="website">
                    </div>
                </div>

                <div class="col-lg-6 col-md-7 col-12">
                    <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">Tentang Kami</h4>

                    <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Kami merupakan perusahaan yang bergerak
                        dibidang portal berita, yang menyajikan berita terlengkap, tercepat, dan teraktual</h2>

                    <p data-aos="fade-up" data-aos-delay="400">
                        <strong>Gisanda Aliya</strong>

                        <span class="mx-1">/</span>

                        <small>CEO Berita Harian</small>
                    </p>
                </div>

            </div>
        </div>
    </section>
   @endsection