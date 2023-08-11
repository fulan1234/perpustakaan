<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>@yield('page_title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('home/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- CSS Modif --}}
    <link rel="stylesheet" href="{{asset('design/css/user.css')}}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('home/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/templatemo-lugx-gaming.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{asset('image/logoAtas2.png')}}" alt="" style="width: 300px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="{{route('dashboard')}}" class="active">Home</a></li>
                      <li><a href="contact.html">Contact Us</a></li>
                      <li>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
              
                          {{-- <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              
                          </button> --}}
                          <button type="submit" class="btn-logout"><i class="fa fa-logout"></i> Logout</button>
                      </form>
                      </li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  @yield('content')
  
  <footer style="margin-top: 5px;">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © Muhammad Fakhri- 2017051076. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Web: Perpustakaan Website</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('home/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('home/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('home/assets/js/isotope.min.js')}}"></script>
  <script src="{{asset('home/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('home/assets/js/counter.js')}}"></script>
  <script src="{{asset('home/assets/js/custom.js')}}"></script>

  </body>
</html>