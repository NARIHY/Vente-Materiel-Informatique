<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Accentic</title>



  <link rel="icon" href="{{asset('public/img/favico.jpeg')}}" type="image/x-icon">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="{{asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/splide/dist/css/splide.min.css')}}">
  <link href="{{asset('public/assets/css/myStyle.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <div id="preloader">

    </div>

  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"> <img src="https://www.accentic.net/wp-content/uploads/2023/08/cropped-accentic-logo-1-160x53.png" alt="Accentic" width="160px" width="53px"> </h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('Public.home')}}" class="@if(request()->routeIS('Public.home')) active @endif">Acceuil</a></li>
          <li><a href="{{route('Public.Product.listing')}}" class="@if(request()->routeIS('Public.Product.listing')) active @endif">Nos produits</a></li>
          <li><a href="{{route('Public.Service.index')}}" class="@if(request()->routeIS('Public.Service.index')) active @endif">Nos services</a></li>
          <li><a href="{{route('Public.Contact.contacts')}}" class="@if(request()->routeIS('Public.Contact.contacts')) active @endif">Contact</a></li>

          @if (!Illuminate\Support\Facades\Auth::check())
          <li><a class="" href="{{route('register')}}">S'inscrire</a></li>
          <li><a class="" href="{{route('login')}}">Se connecter</a></li>
        @else
            @php
                $user = Illuminate\Support\Facades\Auth::user();
            @endphp
            @if ($user->role != 1)
            <li><a class="" href="{{route('Admin.index')}}">Administration</a></li>
            @endif
          <li>
              <form action="{{route('logout')}}" method="post">
                  @csrf
                  <div class="">

                    <input type="submit" value="Déconnexion" style="background: transparent; border:transparent; color:rgb(38, 38, 38); margin-left:5px">
                  </div>

              </form>
          </li>
        @endif


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- commencement du body -->


    @yield('content')

  <!-- End Hero et video -->

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <img src="{{asset('public/img/white.png')}}" width="200px" alt="logo">

              <p>
              Madagascar Antananarivo,101<br>
              Andranomena près du terminus 194<br>
                <strong>Téléphone:</strong> +261 34 60 309 40<br>
                <strong>Email:</strong>contact@accentic.net
                <br>
              </p>
              <div class="social-links mt-3">
                <a href="https://www.briqueweb.com/" class="twitter"><i class="bi bi-globe"></i></a>
                <a href="https://www.facebook.com/briqueweb" class="facebook"><i class="bx bxl-facebook"></i></a>

              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('Public.home')}}">Acceuil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Information</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('Public.Service.index')}}">Nos services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('Public.politique')}}">Terme de notre service</a></li>
            </ul>
          </div>



          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4 style="color: white">Notre newsletter</h4>
            <p style="color: white">Restez à jour avec nos dernières actualités, offres exclusives et informations passionnantes en vous abonnant à notre newsletter mensuelle. Ne manquez jamais une mise à jour importante !</p>
            @if (session('good'))
                <p style="color: green">{{session('good')}}</p>
            @endif
            @if (session('bad'))
            <p style="color: red">{{session('bad')}}</p>
            @endif
            <form action="{{route('Public.subscribe')}}" method="post">
                @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Brique web</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by Narihy
      </div>
    </div>
  </footer><!-- End Footer -->



    <!-- fin du body -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Script js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="{{asset('public/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/splide/dist/js/splide.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{asset('public/assets/js/app.js')}}"></script>
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
        loader.style.display = "none";
    })
  </script>
</body>
