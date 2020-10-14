<!DOCTYPE html>
<html lang="en">
  <head>
    <title>e-Bansos Apps | KGJ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assets/asset_landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/asset_landing/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/asset_landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/asset_landing/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/asset_landing/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/asset_landing/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/assets/asset_landing/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/assets/asset_landing/css/aos.css">

    <link rel="stylesheet" href="/assets/asset_landing/css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
   
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-md-3 col-xl-4  d-block">
            <h1 class="mb-0 site-logo"><img src="/assets/images/avatars/logo.jpg" style="width: 300px" alt=""></h1>
          </div>

          <div class="col-12 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                 <li><a href="#testimonials-section" class="nav-link">Profile Sekolah</a></li>
                    </li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="/siswa" class="nav-link">Home, {{Auth::user()->nama_siswa}}</a></li>
                    @else
                    <li><a href="/login" class="nav-link">Login</a></li>
                    @endif
                    @endauth
                  </ul>
                </li>
              </ul>
            </nav>
          </div>


          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    

    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
            
            <img src="/assets/asset_landing/images/bansos.jpg" style="50%" alt="Image" class="img-fluid img-absolute">

            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Aplikasi Bantuan Sosial Siswa/Siswi</h1>
                <p class="mb-5">Aplikasi ini di buat untuk memudahkan siswa/siswa SMK KARYA GUNA JAYA BEKASI dalam mengajukan permintaan bantuan sosial kepada sekolah, dengan tepat akurat dan cepat</p>
                <div>
                  @if (Route::has('login'))
                  @auth
                  <a href="/siswa" class="btn btn-success btn-lg mr-2 mb-2"><i class="fa fa-home"> Home, {{Auth::user()->nama_siswa}}</a></i>
                  @else
                  <a href="{{route('login')}}" class="btn btn-primary btn-lg mr-2 mb-2"><i class="fa fa-sign-in"> Login</a></i>
                  @endif
                  @endauth
                </div>
              </div>
              
              
            </div>

          </div>
        </div>
      </div>
    </div>  




    <div class="site-section testimonial-wrap bg-light" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Profile Sekolah</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="/assets/asset_landing/images/kepsek.jpeg" alt="Image" class="w-100 img-fluid mb-3 shadow"></div>
                <span>Kepala Sekolah</span>
              </figure>
              <blockquote class="mb-3">
                <p>SMK KARYA GUNA JAYA di bangun pada tahun 2009 dengan luas tanah 12000m2oleh Robbi Diapari, S.Kom  merupakan perintis sekaligus kepala sekolah dari SMK Karya Guna Jaya dibawah naungan lembaga YAYASAN PENDIDIKAN DWI DAYA BHAKTI. Dengan SK Izin Operasional 503.5/11-I/SK SMK/BPPT dengan mengawali siswa baru berjumlah 156 siswa yang  kemudian menjadi angkatan pertama lulusan tahun 2009. </p>
              </blockquote>
              <p class="text-black"><strong>Robbi Diapari, S.Kom</strong></p>

              
            </div>
          </div>


        </div>
    </div>

  

        </div>
      </div>
    </div>

  

  <script src="/assets/asset_landing/js/jquery-3.3.1.min.js"></script>
  <script src="/assets/asset_landing/js/jquery-ui.js"></script>
  <script src="/assets/asset_landing/js/popper.min.js"></script>
  <script src="/assets/asset_landing/js/bootstrap.min.js"></script>
  <script src="/assets/asset_landing/js/owl.carousel.min.js"></script>
  <script src="/assets/asset_landing/js/jquery.countdown.min.js"></script>
  <script src="/assets/asset_landing/js/bootstrap-datepicker.min.js"></script>
  <script src="/assets/asset_landing/js/jquery.easing.1.3.js"></script>
  <script src="/assets/asset_landing/js/aos.js"></script>
  <script src="/assets/asset_landing/js/jquery.fancybox.min.js"></script>
  <script src="/assets/asset_landing/js/jquery.sticky.js"></script>

  
  <script src="/assets/asset_landing/js/main.js"></script>
  
  </body>
</html>