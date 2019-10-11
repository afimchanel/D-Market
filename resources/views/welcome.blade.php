<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>D-Market</title>

  
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="lib/hover/hover.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Responsive css -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">

  

   
</head>

<body background="Dog-Wallpaper.jpg">

 <!-- start section navbar -->
 <nav id="main-nav">
        <div class="row">
          <div class="container">
            <div class="logo">
              <a href="/"><img src="image/logo.png" alt="logo" style="width:50px; height:50px;"></a>
            </div>
            <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>
    
            @if (Route::has('login'))
            <ul class="nav-menu list-unstyled">
                    @auth
              <li><a href="{{ url('/home') }}" class="smoothScroll">Home</a></li>
              @else
              <li><a href="{{ route('login') }}" class="smoothScroll">Login</a></li>
              @if (Route::has('register'))
              <li><a href="{{ route('register') }}" class="smoothScroll">Register</a></li>
              @endif
              @endauth
            </ul>
            @endif
    
          </div>
        </div>
      </nav>
      <!-- End section navbar -->
    
    
      <!-- start section header -->
      <div id="header" class="home">
    
        <div class="container">
          <div class="header-content">
            <h1> D-Market</h1>
            <p>D-Market, ศูนย์กลางการซื้อขายสุนัขสายพันธุ์แท้</p>
          </div>
        </div>
      </div>
      <!-- End section header -->
    
    
      <!-- start section about us -->
      <div id="about" class="paddsection">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4 ">
              <div class="div-img-bg">
                <div class="about-img">
                  <img src="image/golden.jpg" class="img-responsive" alt="me">
                </div>
              </div>
            </div>   
            <div class="col-lg-7">
              <div class="about-descr">
                <p class="p-heading">ศูนย์กลางการซื้อขายสุนัขสายพันธุ์แท้ </p>
                <p class="separator">โกลเดินริทรีฟเวอร์ เป็นสุนัขที่มีความเฉลียวฉลาดมากมากจนสามารถนำมาฝึกเพื่อใช้งานได้ เนื่องจากเป็นสุนัขที่มีขนาดปานกลาง จัดว่าเป็นสุนัขที่มีประสาทสัมผัสที่ดีทั้งในด้านของการฟังเสียง การดมกลิ่นสะกดรอย นอกจากนี้ยังมีสายตาอันเฉียบคมและแม่นยำ ด้วยเหตุนี้วงการทหารและตำรวจในหลายๆ ประเทศจึงได้นำสุนัขพันธุ์นี้มาฝึกเพื่อไว้ช่วยงานราชการ อาทิเช่น ตรวจค้นยาเสพติด, ดมกลิ่นสะกดรอยคนร้าย, ยามรักษาความปลอดภัย แต่ที่ดูเหมือนจะได้รับความนิยมสูงสุด ก็เห็นจะได้แก่ฝึกให้เป็นสุนัขนำทางคนตาบอด ทั้งนี้เพราะโกลเดินริทรีฟเวอร์เป็นสุนัขซึ่งฉลาด แต่ไม่ค่อยเจ้าเล่ห์หรือซุกซนเหมือนสุนัขบางพันธุ์ ขนชั้นนอกแน่น เงา หยิกเป็นลอนเล็กน้อย และราบเรียบไปตามลำตัว กันน้ำได้ดี</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end section about us -->
    

      <!-- start section portfolio -->
      <div id="portfolio" class="text-center paddsection">    
        <div class="container">
          <div class="section-title text-center">
            <h2>My D-Market</h2>
          </div>
        </div>    
        <div class="container">
          <div class="row">
            <div class="col-md-12">    
              
              <div class="portfolio-container">   
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits webdesign" style="width:350px; height:270px;">
                  <a class="popup-img" href="image/portfolio/1.jpg">
                    <img src="image/portfolio/1.jpg" alt="img" >
                  </a>
                </div>
    
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits photography" style="width:350px; height:270px;" >
                  <a class="popup-img" href="image/portfolio/2.jpg">
                    <img src="image/portfolio/2.jpg"  alt="img" >
                  </a>
                </div>
    
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding webdesig photographyn" style="width:350px; height:270px;">
                  <a class="popup-img" href="image/portfolio/3.jpg">
                    <img src="image/portfolio/3.jpg" alt="img" >
                  </a>
                </div>
    
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups webdesign photography" style="width:350px; height:270px;">
                  <a class="popup-img" href="image/portfolio/4.jpg">
                    <img src="image/portfolio/4.jpg" alt="img" >
                  </a>
                </div>
    
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits photography" style="width:350px; height:270px;">
                  <a class="popup-img" href="image/portfolio/5.jpg">
                    <img src="image/portfolio/5.jpg" alt="img" >
                  </a>
                </div>
    
                <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits webdesign" style="width:350px; height:270px;">
                  <a class="popup-img" href="image/portfolio/6.jpg">
                    <img src="image/portfolio/6.jpg" alt="img" >
                  </a>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End section portfolio -->
    
    
      <!-- start section footer -->
      <div id="footer" class="text-center">
        <div class="container">
          <div class="socials-media text-center">
    
            <ul class="list-unstyled">
              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="ion-social-instagram"></i></a></li>
              <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
              <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
            </ul>
    
          </div>
    
        </div>
      </div>
      <!-- End section footer -->
    
      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/jquery/jquery-migrate.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="lib/typed/typed.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/magnific-popup/magnific-popup.min.js"></script>
      <script src="lib/isotope/isotope.pkgd.min.js"></script>
    
      <!-- Contact Form JavaScript File -->
      <script src="contactform/contactform.js"></script>
    
      <!-- Template Main Javascript File -->
      <script src="js/main.js"></script>

    
</body>

</html>