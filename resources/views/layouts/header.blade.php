<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Epaper Harian Topskor </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

<link href="https://www.topskor.id/public_assets/images/topskor.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Lato:300,400,700,900" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{$css}}bootstrap.min.css">
    <!-- Font Aweosme -->
    {{--  <link rel="stylesheet" href="{{$css}}font-awesome.min.css">  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{$css}}owl.carousel.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{$css}}magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{$css}}animate.css">

	<!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{$css}}normalize.css">
    <link rel="stylesheet" href="{{$css}}style2.css">
    <link rel="stylesheet" href="{{$css}}responsive.css">
    <script src="{{$js}}vendor/modernizr-2.8.3.min.js"></script>

	<!-- Color Switcher -->
	<link rel="stylesheet" href="{{$css}}colors/red.css" id="color-switch">
	<!-- teamplate colors -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/turquoise.css">-->
	<!-- <link rel="stylesheet" href="{{$css}}colors/light-green.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/purple.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/light-blue.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/brown.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/yellow.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/green.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/pink.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/deep-orange.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/indigo.css"> -->
	<!-- <link rel="stylesheet" href="{{$css}}colors/orange.css"> -->
	<!-- CSS FOR DEMO - NOT INCLUDED IN MAIN FILES -->
    <link rel="stylesheet" href="demo/demo.css">
</head>
<body>
	<!-- Preloader -->
    <div class="preloader">
    	<div id="loader">
			<div id="box"></div>
			<div id="hill"></div>
		</div>
    </div>
    <!-- Header -->
    <header id="home">
        <nav class="navbar navbar-default" id="main-nav">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					    <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-morki">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Epaper Harian Topskor</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-morki">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="{{url('/')}}" data-scroll>Beranda</a></li>
                                @if ($page == 'Home')
                                <!--li><a href="#screenshots" data-scroll>Screenshots</a></li-->
                                <li><a href="#price-table" data-scroll>Paket Berlangganan</a></li>
                               <li><a href="#testimonial" data-scroll>Testimoni</a></li>
                                <li><a href="#contact" data-scroll>Pasang Iklan</a></li>
                                @else
                                <!--li><a href="{{url('/')}}#screenshots" data-scroll>Screenshots</a></li-->
                                <li><a href="{{url('/')}}#price-table" data-scroll>Paket Berlangganan</a></li>
                               <li><a href="{{url('/')}}#testimonial" data-scroll>Testimoni</a></li>
                                <li><a href="{{url('/')}}#contact" data-scroll>Pasang Iklan</a></li>
                                @endif
                                <li class="nav-download-btn"><a href="#price-table" data-scroll>Berlangganan</a></li>
                                 @if(!Session::get('id'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">{{ __('Register') }}</a>
                            </li> -->
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Session::get('name')}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color:#ed575b">
                                    <center><a class="dropdown-item" href="{{url('/dashboard')}}" data-scroll>
                                            Dashboard
                                        </a></center>
                                    <center><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                    </a></center>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endif
                            </ul>
                        </div><!-- .navbar-collapse -->
					</div>
				</div>
			</div>
		</nav>
    </header><!-- Ends: header -->
