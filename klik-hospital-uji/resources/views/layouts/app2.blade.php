<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Klik-Hospital</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('template_source/img/image-Klik/icon.png')}}" rel="icon">
  <link href="{{asset('template_source/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="{{asset('template_source/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('template_source/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_source/lib/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_source/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_source/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_source/lib/modal-video/css/modal-video.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('template_source/css/style.css')}}" rel="stylesheet">

  <!-- JavaScript Libraries -->
  <script src="{{asset('template_source/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template_source/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('template_source/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template_source/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('template_source/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('template_source/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('template_source/lib/modal-video/js/modal-video.js')}}"></script>
  <script src="{{asset('template_source/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('template_source/lib/wow/wow.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('template_source/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('template_source/js/main.js')}}"></script>
  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#body" class="scrollto"><span>e</span>Startup</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="{{url('/')}}"><img src="{{asset('template_source/img/image-Klik/icon.PNG')}}" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{url('/klik-room')}}"><img src="{{asset('template_source/img/image-Klik/room.PNG')}}" alt="" title="" /></a></li><!-- class="menu-active" -->
          <li><a href="{{url('/klik-doctor')}}"><img src="{{asset('template_source/img/image-Klik/doctor.PNG')}}" alt="" title="" /></a></li>
          <li><a href="#"><img src="{{asset('template_source/img/image-Klik/pharmacy.PNG')}}" alt="" title="" /></a></li>
          <li><a href="#"><img src="{{asset('template_source/img/image-Klik/airplane.PNG')}}" alt="" title="" /></a></li>
          <li><a href="#"><img src="{{asset('template_source/img/image-Klik/info.PNG')}}" alt="" title="" /></a></li>
          <!-- <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <!-- Jika belum login -->
          @guest
          <a data-toggle="modal" data-target="#modalLogin" class="btn btn-default">Login</a><a href="" class="btn btn-default" >Register</a>
          @else
          <!-- jika sudah tampil data  -->
          <a href="" class="btn btn-default" >{{Auth::user()->email}}</a>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  
  @yield('content')
  
  <!--==========================
    Footer
  ============================-->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">
            <img src="{{asset('template_source/img/hero-img.png')}}" height="125" width="150" alt="Hero Imgs" class="img-fluid">
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>About Klik Hospital</h4>

            <ul class="list-unstyled">
              <li><a href="#">How to Book</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Help</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Products</h4>

            <ul class="list-unstyled">
              <li><a href="#">Klik Room</a></li>
              <li><a href="#">Klik Doctor</a></li>
              <li><a href="#">Klik Pharmacy</a></li>
              <li><a href="#">Medical Airplane</a></li>
              <li><a href="#">Health Info</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Other</h4>

            <ul class="list-unstyled">
              <li><a href="#">Newsletter Subscription</a></li>
              <li><a href="#">Term & Condition</a></li>
              <li><a href="#">Register Your Hospital</a></li>
              <li><a href="#">Register Doctor</a></li>
              <li><a href="#">Register Your Pharmacy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Follow Us On</h4>

            <ul class="list-unstyled">
              <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
              <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
              <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i>Google+</a></li>
            </ul>

          </div>
        </div>

      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights Klik-Hospital. All rights reserved.</p>
        <!-- <div class="credits">
          
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
          
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> -->
      </div>
    </div>

  </footer>

  <!-- Modal Section -->
  <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('login')}}">
        @csrf
      <div class="modal-body">
        <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
      </div>
      </form>
    </div>
  </div>
</div>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script type="text/javascript">
    $("#btnLogin").click(function(){
      alert('Tes');
    })
  </script>
</body>
</html>
