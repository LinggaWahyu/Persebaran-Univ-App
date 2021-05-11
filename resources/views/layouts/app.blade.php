<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cari Univ App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('Frontend/style/main.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav
      class="navbar navbar-expand-lg navbar-light navbar-library fixed-top navbar-fixed-top"
    >
      <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand mr-3">
          <img
            src="https://tigerware.lsu.edu/image/1cb577c8-6265-43fa-9ddd-b96ea3e73eb9.png?preset=Full"
            alt="Logo UIN"
            width="45px"
          />
        </a>
        <h5><b>Cari Univ App</b></h5>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
      </div>
    </nav>

    @yield('content')

    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
            <p class="pt-4 pb-2">© 2020 Smart Library. All rights reserved</p>
          </div>
        </div>
      </div>
    </footer>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('Frontend/vendor/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="{{ asset('Frontend/script/navbar-scroll.js') }}"></script>
</body>
</html>
