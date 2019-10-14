<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'D-Market') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer>
    

    </script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <!-- Styles -->
            <style>
                
            
   
                    .carousel-item {
                    height: 100vh;
                    min-height: 350px;
                    background: no-repeat center center scroll;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;

                    }
                                    /* The side navigation menu */
                    .sidenav {
                    height: 100%; /* 100% Full-height */
                    width: 0; /* 0 width - change this with JavaScript */
                    position: fixed; /* Stay in place */
                    z-index: 1; /* Stay on top */
                    top: 0; /* Stay at the top */
                    left: 0;
                    background-color: #111; /* Black*/
                    overflow-x: hidden; /* Disable horizontal scroll */
                    padding-top: 60px; /* Place content 60px from the top */
                    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
                    }

                    /* The navigation menu links */
                    .sidenav a {
                    padding: 8px 8px 8px 32px;
                    text-decoration: none;
                    font-size: 25px;
                    color: #818181;
                    display: block;
                    transition: 0.3s;
                    }

                    /* When you mouse over the navigation links, change their color */
                    .sidenav a:hover {
                    color: #f1f1f1;
                    }

                    /* Position and style the close button (top right corner) */
                    .sidenav .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 36px;
                    margin-left: 50px;
                    }

                    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
                    #main {
                    transition: margin-left .5s;
                    padding: 20px;
                    }

                    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
                    @media screen and (max-height: 450px) {
                    .sidenav {padding-top: 15px;}
                    .sidenav a {font-size: 18px;}
                    }
                </style>
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{('/admin/dashboard')}}">
                    <img src="/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'D-Market') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                  
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret">
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
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

  
        <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
           
            <div class="w3-bar-block">
                
                <a href="/admin/dashboard" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw" ></i>  รายชื่อสมาชิก</a>
                
                <a href="/admin/listdogs" class="w3-bar-item w3-button w3-padding"><i class="fa fa-shopping-cart" ></i>  ข้อมูลสุนัข</a>
                <a href="/admin/post" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user" ></i>  โพสต์</a>
                
                <a href="/admin/payment" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money" ></i>  แจ้งจ่ายเงิน</a><br><br>
            </div>
        </nav>   
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
            title="close side menu" id="myOverlay"></div>

        

                
                <!-- ที่ใ่สเนื้อหา  -->
        <main class="py-6 container">
                @yield('content')
            </main>
        </div>


  
</body>  
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

</div>
</html>
