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
        
                        <!-- เป็นส่วน Bar ฝั่งขวา -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                            <!-- search -->
                            <ul class="navbar-nav mr-auto">
                                <form action="/search" method="POST" role="search">
                                    @csrf
                                    <input class="form-control mr-xl-2" type="search" placeholder="Search" aria-label="Search" name="q">
        
                                </form>
                            </ul>
                            <!--End search -->
        
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
                                            <span class="fa fa-bell"> <span class="badge badge-light">9</span></span>
                                        </a>
                                    </li>
                                </div>
                                <!--End แจ้งเตือน -->
        
                                <!-- Add to car -->
                                <li class="nav-item mr-md-0 pt-4 px-0 ">
                                    <a id="navbar" class="nav-link" style="font-size:20px" href="/show/order/{{ Auth::user()->id}}" role="button">
                                        <span class="fa fa-shopping-cart"></span><span class="badge badge-light"></span>
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
                                        <a class="dropdown-item" href='/{{ Auth::user()->id }}/edit'>แก้ไข้โปรไฟล์</a>
                                        <a class="dropdown-item" href="{{ route('dog.create')}}">เพิ่มสุนัข(ยังไม่ขาย)</a>
                                        <a class="dropdown-item" href="/createbreeder">เพิ่มพ่อแม่พันธุ์</a>
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

  
                <!-- Page Content -->
            <div class="container ">

                    <div class="row">
                
                    <div class="col-lg-3">
                
                        <form action="/searchcategory" method="POST" role="search">
                        @csrf
                        <div class="list-group">
                            <p class="list-group-item active">สายพันธุ์</p>
                            <select class="custom-select" name='Breed'>
                            <option selected>เลือกสายพันธู์</option>
                            <option value="ปั๊ก">ปั๊ก (Pug) </option>
                            <option value="ชิวาวา">ชิวาวา(Chihuahua)</option>
                            <option value="ปอมเมอเรเนียน">ปอมเมอเรเนียน (Pomerania)</option>
                            <option value="ชิสุ">ชิสุ (Shih Tzu)</option>
                            <option value="ยอร์คเชียร์ เทอร์เรียร์">ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
                            <option value="บีเกิล">บีเกิล (Beagle)</option>
                            <option value="บูลด็อก">บูลด็อก (Bulldog)</option>
                            <option value="ไซบีเรียน ฮัสกี้">ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
                            <option value="โกลเด้น รีทรีฟเวอร์">โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
                            <option value="ลาบราดอร์ รีทรีฟเวอร์">ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
                            <option value="0">อื่นๆ</option>
                
                            </select>
                        </div>
                        <div class="list-group">
                
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">ช่วงอายุสุนัข</label>
                            <select class="custom-select" name="Age_Dog">
                                <option selected>เลือกช่วงอายุ</option>
                                <option value="1">1-2</option>
                                <option value="2">3-4</option>
                                <option value="3">5-6</option>
                                <option value="4">อื่นๆ</option>
                            </select>
                            </div>
                
                
                        </div>
                
                
                        <div class="list-group">
                
                            <div class="form-group">ลักษณะ
                            <select class="custom-select" name='type_dog'>
                                <option selected>เลือกขนาด</option>
                                <option value="1">ตัวเล็ก</option>
                                <option value="2">ตัวใหญ่</option>
                
                            </select>
                            </div>
                        </div>
                
                        <div class="list-group">
                            <div class="form-group">
                            น้ำหนัก
                            <select class="custom-select" name="weight_dog">
                                <option selected>เลือกน้ำหนัก</option>
                                <option value="1">1-5 กิโล</option>
                                <option value="2">5-10 กิโล</option>
                                <option value="3">มากว่านั้น</option>
                            </select>
                            </div>
                        </div>
                
                
                        <div class="list-group">
                
                            <div class="form-group">สีตา
                            </div>
                            <select class="custom-select" name="eye_color">
                            <option selected>เลือกสีตา</option>
                            <option value="1">ดำ</option>
                            <option value="2">น้ำตาล</option>
                            <option value="3">ฟ้า</option>
                            <option value="4">อื่นๆ</option>
                            </select>
                        </div>
                
                        <div class="list-group">
                
                            <div data-role="rangeslider">
                            <label for="price-min">Price:</label>
                            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000" class="custom-range">
                            หาทางทำตรงนี้ยู key คือ range slider laravel price range slider
                            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000" class="custom-range">
                            </div>
                        </div>
                
                        <div class="form-group ">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
                            <select class="custom-select" name='color'>
                            <option selected>เลือกสี</option>
                            <option value="1">ขาว</option>
                            <option value="2">ดำ</option>
                            <option value="3">อื่น</option>
                            </select>
                        </div>
                
                
                
                        <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
                            <select class="custom-select" name='SEX' required>
                            <option selected>เลือกเพศสุนัข</option>
                            <option value="M">ตัวผู้</option>
                            <option value="G">ตัวเมีย</option>
                
                            </select>
                            <div class="invalid-feedback">กรุณาเลือกเพศ</div>
                        </div>
                
                        <button class="btn btn-outline btn-filmm my-2 my-sm-0" type="submit">ค้นหา</button>
                        </form>
                
                
                    </div>
                    <!-- /.col-lg-3 -->
                
                
                    <div class="col-lg-9 ">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เรียงจาก
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                
                                <div class="container">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <span class="text-uppercase ">น้อยไปมาก</span>
                                        <ul class="nav flex-column">
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                <!--  /.container  -->
                                </div>
                            </li>
                            </ul>
                        </div>
                        </nav>
                        <div class="row ">
                        @yield('row')
                        </div>
                        
                    </div>
                    <!-- /.col-lg-9 -->
                
                    </div>
                    <!-- /.row -->
                
                </div>
                <!-- /.container -->
      
                <!-- ที่ใ่สเนื้อหา  -->
      
        </div>


  
</body>  
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
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
</div>
</html>
