<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','D-Market') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('../../css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <!-- Styles -->
    <style>

        #imgs {
        display: block;
        margin-left: auto;
        margin-right: auto;
        }
        
        /* ส่วนที่เพิ่มที่อยู่และอัพรูป */
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* float: right; */
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }
    </style>

</head>
<?php 
use App\orderdetail;
$cartcount = orderdetail::countcart();
?>
<body>

   

    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-light	shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/../image/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- เป็นส่วน Bar ฝั่งขวา -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest

                    @else

                <!-- search -->
                <ul class="navbar-nav mr-auto">
                    <form action="/search" method="POST" role="search">
                        @csrf
                        <input class="form-control mr-xl-5" type="search" placeholder="Search" aria-label="Search" name="q">
                    </form>
                </ul>
                <!--End search -->
                @endguest

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
                
                    <!-- แจ้งเตือน -->
                    <div class="navbar-nav mr-md-0 pt-4 px-0">
                        <li class="nav-item  ">
                            <a id="navbarDropdown" class="nav-link" style="font-size:20px" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="fa fa-bell"> <span class="badge badge-light">
                                
                                </span></span>
                            </a>
                        </li>
                    </div>
                    <!--End แจ้งเตือน -->

                    <!-- Add to car -->
                    <li class="nav-item mr-md-0 pt-4 px-0 ">
                        <a id="navbar" class="nav-link" style="font-size:20px" href="/show/order/{{ Auth::user()->id}}" role="button">
                            
                            <span class="fa fa-shopping-cart">{{$cartcount}}</span>
                        </a>
                    </li>
                    <!--End Add to car -->

                    <!-- User dropdown -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="img-fluid rounded-circle p-3" src="/storage/avatars/{{Auth::user()->Avatar}}" style="width:80px; height:80px;"> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href='/user/{{ Auth::user()->id }}'>โปรไฟล์</a>
                            <a class="dropdown-item" href='/{{ Auth::user()->id }}/edit'>แก้ไขโปรไฟล์</a>
                            <a class="dropdown-item" href="{{ route('dog.create')}}">เพิ่มลูกสุนัข</a>
                            
                            <a class="dropdown-item" href="{{ route('Payment.index') }}">แจ้งชำระเงิน</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!--End User dropdown -->

                    @endguest
                </ul>
            </div>
            <!--End เป็นส่วน Bar ฝั่งขวา -->

    </div>
</nav>
        <main class="py-4 bg-white">
            @yield('content')
        </main>
    </div>

</body>

</html>