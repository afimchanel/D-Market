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
                    <div class="col-md-12 py-6">
                        <h2>หมวดหมู่สุนัข</h2>
                        
                    </div>
                </div>
            </div>



            <h1 class="container font-weight-light text-center text-lg-left mt-4 mb-0">โพสขาย</h1>

            <hr class="mt-2 mb-5">

        <!-- ส่วนของโชว์สายพันยอดฮิต-->
        <div class="container">
        
            <div class="row -md-4 mb-5">
                @foreach ($post as $item)
                <div class="card" style="width: 18rem;">
                    
                    <div class="card-body">
                        <a href="/{{$item->Post_id}}/view/post">
                            <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}" alt="">
                            <h3 class="card-text">{{$item->title_post}}</h3></a>
                    <p class="card-subtitle mb-2 text-muted">{{$item->Detail_Dog}}</p>
                    </div>
                    <div class="card-footer">
                    <p  class="primary sm">ราคา : {{$item->price}}</p>
                      </div>
                  </div>
               @endforeach
                   
            </div>
           
             
            


        </div>

        <!-- ส่วนของขายดีประจำสัปดาห์-->
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <h1 class="my-4">ขายดีประจำสัปดาห์</h1>
                @foreach ($post as $item) 
                <div class="container">
                        
                    @if ($item->type ==0)
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 mb-4">
                                
                                <div class="card h-100">
                                        <a href="user/{{$item->id}}"><img class="card-img-top" src="/storage/avatars/{{$item->Avatar}}" alt=""></a>
                                        <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="user/{{$item->id}}">{{$item->name}}</a>
                                        </h4>
                                        
                                        </div>
                                    </div>
                                
                            
                            </div>
            
                         
            
                        </div>
                    </div>
                    @endif
                    @endforeach

        </div>
        

                



            
@endsection
