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
       



            <h1 class="container font-weight-light text-center text-lg-left mt-4 mb-0">โพสขาย  </h1>
            
            <hr class="mt-2 mb-5">

        <!-- ส่วนของโชว์สายพันยอดฮิต-->
        <div class="container">
            <a href="{{ route('post.index') }}">
                    <h5 class="text-right" >ดูทั้งหมด</h5>
            </a>
            

            <div class="row -md-4 mb-5">
                @foreach ($post as $item)
                <div class="card" style="width: 18rem;">
                    
                    <div class="card-body">
                    <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">
                            <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:250px; height:250px;">
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
