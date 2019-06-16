<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'D-Market') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer>
    

    
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

		/* ยังไม่รู้ */
		.carousel .item {
			text-align: center;
			overflow: hidden;
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
									
									<a class="dropdown-item" href='{{'/user/{id}'}}' >Profile</a>
									<a class="dropdown-item" href='{{'/{id}/edit'}}'  >Editprofile</a>
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
                                    <span class="">เเจ้งเตือน</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right glyphicon glyphicon-star" aria-labelledby="navbarDropdown">
                                
                                   
                                </div>
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
