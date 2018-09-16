<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Epaper Harian Topskor') }}</title>

    <!-- Scripts -->
    <script src="{{$js2}}app.js" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">    
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Styles -->
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link href="{{$css2}}login.css?=v1" rel="stylesheet">
    <link href="{{$css2}}app.css" rel="stylesheet">
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }
        
        * {
          box-sizing: border-box;
        }
        
        /* style the container */
        .container {
          position: relative;
          border-radius: 5px;
          /*background-color: #f2f2f2;*/
          padding: 20px 0 30px 0;
        }
        
        /* style inputs and link buttons */
        .username,
        .password,
        .tombol {
          width: 85%;
          padding: 12px;
          border: none;
          border-radius: 4px;
          margin: 7px 2px;
          opacity: 0.85;
          display: inline-block;
          font-size: 15px;
          line-height: 14px;
          text-decoration: none; /* remove underline from anchors */
        }
        .username:hover,
        .password:hover,
        .tombol:hover {
          opacity: 1;
        }
        
        /* add appropriate colors to fb, twitter and google buttons */
        .fb {
          background-color: #3B5998;
          color: white;
        }
        
        .twitter {
          background-color: #55ACEE;
          color: white;
        }
        
        .google {
          background-color: #dd4b39;
          color: white;
        }
        
        /* style the submit button */
        .submit {
          background-color: #eba007;
          color: white;
          cursor: pointer;
        }
        
        .submit:hover {
          background-color: #eba007;
        }
        
        /* Two-column layout */
        .col {
          float: left;
          width: 50%;
          margin: auto;
          padding: 0 50px;
          margin-top: 6px;
        }
        
        .col2 {
          float: left;
          width: 100%;
          margin: auto;
          padding: 0 50px;
          margin-top: 6px;
        }
        
        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        
        /* vertical line */
        .vl {
          position: absolute;
          left: 50%;
          transform: translate(-50%);
          border: 2px solid #ddd;
          height: 175px;
        }
        
        /* text inside the vertical line */
        .vl-innertext {
          position: absolute;
          top: 50%;
          transform: translate(-50%, -50%);
          background-color: #f1f1f1;
          border: 1px solid #ccc;
          border-radius: 50%;
          padding: 8px 10px;
        }
        
        /* hide some text on medium and large screens */
        .hide-md-lg {
          display: none;
        }
        
        /* bottom container */
        .bottom-container {
          text-align: center;
          background-color: #eba007;
          border-radius: 0px 0px 4px 4px;
        }
        
        /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 650px) {
          .col {
            width: 100%;
            margin-top: 0;
          }
          /* hide the vertical line */
          .vl {
            display: none;
          }
          /* show the hidden text on small screens */
          .hide-md-lg {
            display: block;
            text-align: center;
          }
        }
        @media (min-width: 768px) {
          .omb_row-sm-offset-3 div:first-child[class*="col-"] {
              margin-left: 25%;
          }
      }
      
      .omb_login .omb_authTitle {
          text-align: center;
        line-height: 300%;
      }
        
      .omb_login .omb_socialButtons a {
        color: white; // In yourUse @body-bg 
        opacity:0.9;
      }
      .omb_login .omb_socialButtons a:hover {
          color: white;
        opacity:1;    	
      }
      .omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
      .omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
      .omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}
      
      
      .omb_login .omb_loginOr {
        position: relative;
        font-size: 1.5em;
        color: #aaa;
        margin-top: 1em;
        margin-bottom: 1em;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
      }
      .omb_login .omb_loginOr .omb_hrOr {
        background-color: #bfc3c6;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
      }
      .omb_login .omb_loginOr .omb_spanOr {
        display: block;
        position: absolute;
        left: 50%;
        top: -0.6em;
        margin-left: -1.5em;
        background-color: white;
        width: 3em;
        text-align: center;
      }			
      
      .omb_login .omb_loginForm .input-group.i {
        width: 2em;
      }
      .omb_login .omb_loginForm  .help-block {
          color: red;
      }
      
        
      @media (min-width: 768px) {
          .omb_login .omb_forgotPwd {
              text-align: right;
          margin-top:10px;
         }		
      }
        </style>
</head>
<body>
    <div id="app">
      <?php /*
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel hddi">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Epaper Harian Topskor') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(!Session::get('id'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Session::get('name')}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> */ ?>

        <main class="py-4" style="background-image:url({{$images}}back-topskor.png)">
            @yield('content')
        </main>
    </div>
</body>
</html>
