<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','D-Market') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer>
    

    
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
	
	
    <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                   
					body {
  overflow-x: hidden;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
} 



body {
            background: #ebebeb;
            font-family: "Open Sans", sans-serif;
        }

        .carousel {
            margin-top: 20px;
        }

        .carousel-item {
            text-align: center;
            min-height: 280px;
            /* Prevent carousel from being distorted if for some reason image doesn't load */
        }

        .bs-example {
            margin: 20px;
        }

        /* กำหนดขนาดรูแภาพให้เป็นวงกลม */
        .circle {
            /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
            height: 150px;
            /* ความสูงปรับให้เป็นออโต้ */
            width: 150px;
            /* ความสูงปรับให้เป็นออโต้ */
            border: 3px solid #fff;
            /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
            border-radius: 100px;
            /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/

        }

        /* บล็อกกรอบของทั้งรูปภาพ */
        .carousel .thumb-wrapper {
            padding: 25px 15px;
            background: #fff;
            border-radius: 6px;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
        }

        /* บล็อกรูปภาพ */
        .carousel .item .img-box {
            height: 120px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }

        /* การกำหนดสไลด์ว่าจะให้อยู่ตรงไหน */
        .col-center {
            margin: 0 auto;
            float: none !important;
        }

        /* การกำหนดระยะของปุ่มกดเลือน */
        .carousel {
            margin: 30px auto 60px;
            padding: 0 80px;
        }

        /* ตัวหนังสือ */
        .carousel .item h4 {
            font-family: 'Varela Round', sans-serif;
        }

        /* บล็อกรูปภาพ */
        .carousel .item .img-box {
            height: 120px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }

        /* บล็อกของกรอบ */
        .carousel .thumb-wrapper {
            margin: 5px;
            text-align: center;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /* ขนาดกรอบของแต่ละกรอบ */
        .carousel .thumb-content {
            padding: 15px;
            font-size: 13px;
        }

        /* กรอบของสไลด์ */
        .carousel .carousel-control {
            height: 44px;
            width: 44px;
            background: none;
            margin: auto 0;
            border-radius: 50%;
            border: 3px solid rgba(0, 0, 0, 0.8);
        }

        /* ขนาดของตัวคลิกเพื่อเลือนไปยังหน้าอื่น */
        .carousel .carousel-control i {
            font-size: 36px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -19px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            font-weight: bold;
        }

        /* ระยะการวางจุดเลือน */
        .carousel .carousel-control.left i {
            margin-left: -3px;
        }

        .carousel .carousel-control.right i {
            margin-right: -3px;
        }

        .carousel .carousel-indicators {
            bottom: -50px;
        }

        /* ระยะการวางจุดเลือน */
        .carousel1 .carousel-control.left i {
            margin-left: -3px;
        }

        .carousel1 .carousel-control.left i {
            margin-right: -3px;
        }

        .carousel1 .carousel-indicators {
            bottom: -50px;
        }

        /* สีของจุดเลื่อน */
        .carousel-indicators li {
            background: #ababab;
        }

        .carousel-indicators li.active {
            background: #555;
        }

        /* แบบของตัว Add to cart */
        .carousel .thumb-content .btn {
            color: #a177ff;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            border: 1px solid #a177ff;
            padding: 6px 14px;
            margin-top: 5px;
            line-height: 16px;
            border-radius: 20px;
        }

        /* กดหัวใจ */
        .carousel .wish-icon .fa-heart {
            color: #ff6161;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        /* Timeline */
        #timeline-wrap {
            margin: 10% 10%;
            top: 50;
            position: relative;

        }

        #timeline {
            height: 1px;
            width: 100%;
            background-color: #aabbc4;
            position: relative;

        }

        .marker {
            z-index: 1000;
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            margin-left: -25px;
            background-color: #999999;
            border-radius: 50%;
        }

        .marker:hover {
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);

            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .timeline-icon.one {
            background-color: #3e4f88 !important;
        }

        .timeline-icon.two {
            background-color: #536295 !important;
        }

        .timeline-icon.three {
            background-color: #6976a2 !important;
        }

        .timeline-icon.four {
            background-color: #7e8aaf !important;
        }

        .mfirst {
            top: -25px;
        }

        .m2 {
            top: -25px;
            left: 32.5%
        }

        .m3 {
            top: -25px;
            left: 66%
        }

        .mlast {
            top: -25px;
            left: 100%
        }

        .timeline-panel {
            margin-top: 20%;
            width: 500px;
            height: 200px;
            background-color: #cbd0df;
            border-radius: 2px;
            position: relative;
            text-align: left;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            line-height: 20px;
            float: left;
        }

        .timeline-panel:after {
            content: '';
            position: absolute;
            margin-top: -12%;
            left: 10%;
            width: 0;
            height: 0;
            border: 12px solid transparent;
            border-bottom: 15px solid #cbd0df;
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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning	shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'D-Market') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <input class="form-control mr-xl-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success btn-filmm my-2 my-sm-0" type="submit">Search</button>
                    </ul>

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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
								 
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									
									<a class="dropdown-item" href='/user/{{ Auth::user()->id }}' >Profile</a>
									<a class="dropdown-item" href='/{{ Auth::user()->id }}/edit'  >Editprofile</a>
									<a class="dropdown-item" href="{{ route('dog.create')}}" >Add_dog</a>
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
							<li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="fa fa-bell"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right glyphicon glyphicon-star" aria-labelledby="navbarDropdown">
                                
                                   
                                </div>
                            </li>
                            <li class="nav-item  ">
                                <a id="navbar" class="nav-link  " href="/show/order/{{ Auth::user()->id}}" role="button"  >
                                    <span class="fa fa-shopping-cart"></span>
                                </a>

                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-white">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
    
        <!-- Grid row -->
        <div class="row">
    
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">
    
            <!-- Content -->
            <h5 class="text-uppercase">D-Market</h5>
            <p>เว็บแอปพิเคชั้น D-Market ขอขบคุณผู้สนับสนุน</p>
    
            </div>
            <!-- Grid column -->
    
            <hr class="clearfix w-100 d-md-none pb-3">
    
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
    
            <!-- Links -->
            <h5 class="text-uppercase">ผู้จัดทำ</h5>
    
            <ul class="list-unstyled">
                <li>
                นาย วสันต์ ขุมทอง
                </li>
                <li>
                นาง สาวชุดา แสดรัมย์
                </li>
        
            </ul>
    
            </div>
            <!-- Grid column -->
    
    
            </div>
            <!-- Grid column -->
    
        </div>
        <!-- Grid row -->
    
        </div>
        <!-- Footer Links -->
    
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://www.facebook.com/hirakorikka"> ติดต่องาน facebook.com</a>
        </div>
        <!-- Copyright -->
    
    </footer>
    <!-- Footer -->
</body>
</html>
