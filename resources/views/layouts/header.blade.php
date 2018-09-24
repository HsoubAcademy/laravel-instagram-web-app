<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">

  <title>انستغرام حسوب</title>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/fonts/fonts.css') }}" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/album.css') }}" rel="stylesheet">
  <style type="text/css">
    .twitter-typeahead { width: 100%; } 
    .twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
  </style>
</head>

<body>
  <header style="position:  fixed;z-index:  10000;width:  100%;">
    <div class="navbar navbar-dark bg-dark box-shadow">
      <div class="container d-flex justify-content-between" style="direction:  rtl;">
        <div class="row" style="width: 100%">
          <div class="col-md-2">
            <a href="#" class="">
              <img src="{{ asset('assets/img/Hsoub-white.png') }}" style="width: 73%;float:  right;">
            </a>
          </div>
          <div class="col-md-8">
            <input class="form-control" id="search" style="direction: rtl;width: 100%" type="text" placeholder="البحث" aria-label="Search" autocomplete="off">
          </div>
          <div class="col-md-2">
            <button class="navbar-toggler" type="button" onclick="location.href='{{url('user/profile')}}';" >
              <i class="fa fa-user"></i>
            </button>
    <!--         <button class="navbar-toggler" type="button" >
              <i class="fa fa-heart"></i>
            </button> -->
            <button class="navbar-toggler" type="button" onclick="location.href='{{url('post/create')}}';" >
              <i class="fa fa-plus"></i>
            </button>
            <a class="navbar-toggler" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>  
        </div>  
      </div>
    </div>
  </header>