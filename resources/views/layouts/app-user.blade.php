<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Cari Univ App</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="{{ asset('Frontend/images/fevicon.png') }}" type="image/gif" />
  <!-- bootstrap css -->
  <link href="{{ asset('Frontend/style/main.css') }}" rel="stylesheet" />
  <!-- style css -->
  <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
  <!-- Responsive-->
  <link rel="stylesheet" href="{{ asset('Frontend/css/responsive.css') }}">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="{{ asset('Frontend/css/jquery.mCustomScrollbar.min.css') }}">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

  <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />

    <script src="https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js"></script>
    <link
      href="https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css"
      rel="stylesheet"
    />

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css"
      rel="stylesheet"
    />

    <style>
      .marker {
        display: block;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        padding: 0;
      }

      #map {
        position: static;
        top: 0;
        bottom: 0;
        width: 100%;
      }
    </style>
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="{{ asset('Frontend/images/loading.gif') }}" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  
  @yield('header')

  @yield('content')

    <!--  footer -->
    <footr>
      <div class="footer ">
        <div class="copyright">
          <div class="container">
            <p>Copyright © 2021 Cari Univ App</p>
          </div>
        </div>
      </div>
    </footr>

    @stack('addon-script')

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('Frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="{{ asset('Frontend/script/navbar-scroll.js') }}"></script>

</body>

</html>