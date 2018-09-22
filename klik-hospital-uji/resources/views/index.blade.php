@extends('layouts.app2')

@section('content')
<!--==========================
    Hero Section as 1st Content
  ============================-->
<section class="hero wow fadeIn">
    <div class="hero-container">
      <!-- <h1>Welcome to eStartup</h1>
      <h2>Elegant Bootstrap Template for Startups, Apps &amp; more...</h2> -->
      <img src="{{asset('template_source/img/hero-img.png')}}" alt="Hero Imgs">
      <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
      <div class="btns">
        <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
        <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
        <!-- <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a> -->
      </div>
    </div>
  </section><!-- #hero -->

  <!--==========================
    Get Started Section
  ============================-->
  <section id="get-started" class="get-started padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Solusi di Waktu Genting</h2>
        <p class="separator">Klik Hospital hadir untuk memberikan solusi kepada anda</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{asset('template_source/img/svg/cloud.svg')}}" alt="img" class="img-fluid">
            <h4>Kecepatan</h4>
            <p>No more waits, calls to find your room and doctor, or to go out and search the pharmacy store with Klik-Hospital</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{asset('template_source/img/svg/planet.svg')}}" alt="img" class="img-fluid">
            <h4>Assurance</h4>
            <p>A trustable partner you can caunt on for your health, its the best solution to find your needs</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="{{asset('template_source/img/svg/asteroid.svg')}}" alt="img" class="img-fluid">
            <h4>Security</h4>
            <p>Guarantee Protection for your person-aldata and payment, so you wouldn't need to worry</p>
          </div>
        </div>

      </div>
    </div>
    <a href="#about-us" class="btn btn-default scrollto">Partner</a>
  </section>

  <!--==========================
    About Us Section as Partners
  ============================-->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
		<div class="container">
  			<div class="section-title text-center">
  				<h2>Klik-Hospital Partners</h2>
  			</div>
  		</div>
    <div class="container">
      <div class="row justify-content-center">
      	<div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
        	<img src="{{asset('template_source/img/about-img.png')}}" alt="About">
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Features Section as Promotion
  ============================-->

  <section id="features" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Promotion & Deals</h2>
        <p class="separator">Dimanapun anda berada, selalu ada alasan untuk berhemat</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
<!-- Todo di for promosinya -->
        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/paint-palette.svg" alt="img" class="img-fluid">
            <h4>creative design</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/vector.svg" alt="img" class="img-fluid">
            <h4>Retina Ready</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/design-tool.svg" alt="img" class="img-fluid">
            <h4>easy to use</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Free Updates</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Free Updates</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/cloud-computing.svg" alt="img" class="img-fluid">
            <h4>App store support</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/pixel.svg" alt="img" class="img-fluid">
            <h4>Perfect Pixel</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="img/svg/code.svg" alt="img" class="img-fluid">
            <h4>clean codes</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  
@endsection