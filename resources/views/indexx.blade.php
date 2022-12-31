@extends('layouts.core')
@section('title')
    Home
@endsection
@section('container')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="shortcut icon" href="/img/favicon.ico">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">

        <!-- <div class="container animate__animated animate__backInUp"> -->
       <!--  <section id="intro">
            <div class="wrapper px-3">
                <div class="intro-left">
                    <h1>Creative Technology to Grow Your Knowledge</h1>
                    <p>
                        The modern option that makes it very easy for you to borrow books without having to waste a lot of time in the library.
                    </p>
                    <a href="/books" class="btn btn-primary intro-cta text-decoration-none">
                        Try For Free
                    </a>
                </div>
                <div class="intro-right"> -->
                    <!-- Insert Image here -->
                   <!--  <img src="style4/img/home/reading.svg" alt="image" class="undraw-growth">
                </div>
            </div>
        </section>  -->
        <!-- Intro Page END -->
<!-- <div class="    ">   
<h1>Wilujeung Sumping Di Perpustakaan Digital Kabupaten Subang </h1>
        </div> -->
        <!-- About Page Start -->
        <!-- <div class="container animate__animated animate__backInUp"> -->
        <div class="about-section " data-aos="fade-up" data-aos-delay="200">
            <div class="inner-container">
                <h1 class="text-center text-uppercase">Perpustakaan Digital Kabupaten Subang</h1>
                <p class="text">
                        Perpustakaan daerah adalah salah satu fasilitas yang diadakan oleh pemerintah daerah kabupaten subang untuk memberikan sarana penunjang kebutuhan masyarakat kabupaten subang dalam kegiatan literasi.
                </p>
            </div>
            </div>
        </div>
        
        <!-- About Page END -->
        
    </div>

    <!-- Page Banner START -->
    
    <div class="page-banner px-2 font-dark" data-aos="fade-up" data-aos-delay="200">
        <h1>Mari Bergabung Sebagai Anggota Perpustakaan Digital</h1>
        <h3>untuk mendapatkan fitur yang lebih lengkap</h3>
        <a href="/developer" class="text-uppercase text-decoration-none">Visit the Owner</a>
    </div>
    
    <!-- Banner END -->
    
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init({
        once: true,
      });
  </script>  
@endsection
