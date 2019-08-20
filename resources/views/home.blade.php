@extends('layouts.app')
<style type="text/css">
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
			height: 50px;
			width: 50px;
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

        <h1 class="container font-weight-light text-center text-lg-left mt-4 mb-0">โพสขาย  </h1>

        <!-- ส่วนของโชว์สายพันยอดฮิต-->
        <div class="container">
            <a href="{{ route('post.index') }}">
                    <h5 class="text-right" >ดูทั้งหมด</h5>
            </a>
            
            <div class="row -md-4 mb-5">
                    <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="0">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                               
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item carousel-item active">
                                    <div class="row">
                                        @foreach ($post as $item)
                                        <div class="col-sm-3">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                        <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">
                                                        <img class="img-responsive img-fluid" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:120px; height:120px;">
                                                        </a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h4>{{$item->title_post}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        	<!-- Carousel controls -->
                                        @endforeach
                                    </div>
                                </div>   
                            </div>
                <a class="carousel-control left carousel-control-prev" href="#myCarousel1" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel1" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                </a>

        </div>



        <!-- ส่วนของขายดีประจำสัปดาห์-->
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <h1 class="my-4">ผู้ใช้ที่ขายดีประจำสัปดาห์</h1>
                <div class="container">
                    <div class="row">
                @foreach ($user as $item) 
                
                    @if ($item->type == 0)
                        
                            <div class="col-lg- col-sm- mb-4 mx-3">
                                
                                <div class="card h-100">
                                        <a href="user/{{$item->id}}"><img class="card-img-top" src="/storage/avatars/{{$item->Avatar}}" style="width:300px; height:250px;"></a>
                                        <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="user/{{$item->id}}">{{$item->name}}</a>
                                        </h4>
                                        
                                        </div>
                                    </div>
                                
                            
                            </div>
            
                         
            
                        
                    @endif
                    
                    @endforeach
                    
                </div>
                {{$user->links()}}
            </div>

        </div>
        

                



            
@endsection
