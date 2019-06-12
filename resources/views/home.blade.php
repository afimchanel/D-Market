@extends('layouts.app')

@section('content')

        <!-- ภาพสไลด์ -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    
                <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item  active" style="background-image:url('/image/Siberian.png')">
                    <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">D-Market</h2>
                    <p class="lead">นี้คือเว็บศูนกลางการซื้อ-ขาย สุนัขที่ยอดเยี่ยมที่สุด</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('/image/Chihuahua1.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">D-Market</h2>
                    <p class="lead">นี้คือเว็บศูนกลางการซื้อ-ขาย สุนัขที่ยอดเยี่ยมที่สุด</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('/image/Siberian3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">D-Market</h2>
                    <p class="lead">นี้คือเว็บศูนกลางการซื้อ-ขาย สุนัขที่ยอดเยี่ยมที่สุด</p>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
            </div>

            <!--สไลด์ -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>หมวดหมู่สุนัข</h2>
                        <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="0">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel1" data-slide-to="1"></li>
                                <li data-target="#myCarousel1" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item carousel-item active">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Apple iPad</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Sony Headphone</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Macbook Air</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Nikon DSLR</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item carousel-item">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Sony Play Station</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Macbook Pro</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Bose Speaker</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Bose Speaker</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item carousel-item">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Apple iPhone</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Canon DSLR</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Google Pixel</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <img class="circle" src="img/Pug-in-bed-with-confused-or-sad-cute-face.jpg"
                                                        width="120" height="120 " class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>Apple Watch</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel controls -->
                            <a class="carousel-control left carousel-control-prev" href="#myCarousel1" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="carousel-control right carousel-control-next" href="#myCarousel1" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>





        <!-- ส่วนของโชว์สายพันยอดฮิต-->
        <div class="container">
        
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">สายพันธุ์ยอดฮิต</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/image/pug.jpg" alt="">
                    </a>
                    
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="/image/Siberian2.jpg" width="400px" height="300px" alt="">
                    </a>
            </div>

            
            </div>
        </div>

        <!-- ส่วนของขายดีประจำสัปดาห์-->
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="container">
                        <h1 class="my-4">ขายดีประจำสัปดาห์</h1>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="/image/Siberian2.jpg" alt=""></a>
                                <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">ไซบีเรียน ขายดี</a>
                                </h4>
                                <p class="card-text">ไม่เหาไม่กัดนิสัยดี</p>
                                </div>
                            </div>
                            </div>
            
                            <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top"  height="300" src="/image/Chihuahua1.jpg" alt=""></a>
                                <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">ชิวาวา</a>
                                </h4>
                                <p class="card-text">พร้อมขาย</p>
                                </div>
                            </div>
                            
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="/image/pug.jpg" alt=""></a>
                                <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">ปั้ก</a></a>
                                </h4>
                                <p class="card-text">พร้อมขาย</p>
                                </div>
                            </div>
                            </div>
            
                        </div>
                    </div>


        </div>
        

                



            
@endsection
