@extends('layouts.app')

    @section('content')


    <!-- ด้านบนหน้าร้าน -->
   
        <div class="jumbotron jumbotron-fluid " >
               

                <div class="container ">
                    
                    <div class="container">
                
                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4 ">โปรไฟล์  {{ $users->name }} 
                        </h1>
                
                            <hr class="mt-2 mb-5">

                            <div class="row text-center text-lg-left">
                                    
                            <div class="col-sm-3">          
                                <img class="img-fluid img-thumbnail" src="/storage/avatars/{{$users->Avatar}}" style="width:300px; height:250px;"> 
                            </div> 

                        <div class="" >
                            E_mail :    {{ $users->email }}   <br>
                            ชื่อ-นาสกุล :  {{ $users->name }}  <br>
                            เบอร์โทรศัพท์ : {{ $users->Tel }} <br>
                            วันเดือนปีเกิด : {{ $users->DateofBirth }} <br>
                            @if ($users->license = 'noimage.jpg'	)
                            ใบทะเบียนจากสมาคม : สถานะ ไม่มี <br>
                            @else
                            ใบทะเบียนจากสมาคม : สถานะ มี <br>
                            @endif
                            
                            
                            ที่อยู่: {{ $users->address }}
                            
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
    <header class="bg-warning
    text-center py-5 md-4">
        <div class="container bg-warning">
          <h1 class="font-weight-light text-white ">ข้อมูล ของคุณ</h1>
        </div>
        
      </header>
      <div class="container py-5 md-4">
          

          <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">โพสทั้งหมดของคุณ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false" >สุนัขทั้งหมด</a>

              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  
                      <!-- Page Content -->
                      <div class="container">
                              
                                 <!-- Sidebar -->

                                 
                                <!-- Team Member 1 -->
                                <div class="row">
                               @foreach ($posts as $item)
                               
                                <div class="col-lg-4 col-sm-6 mb-4">
                                  <div class="card h-100">
                                  <a href="/{{$item->id_the_dog}}/{{$item->Post_id}}/view/post">
                                    
                                    <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:250px; height:250px;">
                                  
                                  </a>
                                    <div class="card-body">
                                      <h4 class="card-title">
                                      <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">{{$item->title_post}}</a>
                                      </h4>
                                      <p class="card-text">{{$item->Detail_Dog}}</p>
                                    </div>
                                  </div>
                                </div>
                              
                               @endforeach
                              </div>
                      </div>
                            <!-- /.container -->
                            
              </div>
              
              
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                          <!-- Related Projects Row -->
                        

                        <div class="container">
                          
                          <!-- Page Features -->
                          
                          <div class="row text-center">

                          

                            @foreach ($Dogs as $item) 
                                    
                                
                              
                                <div class="col-lg-3 col-md-6 mb-4 ">
                                    <div class="card h-100">
                                      

                                      <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:250px; height:250px;">
                                    
                                      
                                      <div class="card-body">
                                      <h4 class="card-title">{{$item->Breed}}</h4>
                                      
                                      <!--<p class="card-text"></p>-->
                                      </div>
                                      <div class="card-footer">
                                      <a href="/view/dog/{{$item->ID_dog}}" class="btn btn-light" >ดูรายละเอียด</a>
                                              @if ($item->user->id == auth()->user()->id)
                                                  
                                              
                                        
                                                <a href="/edit/dog/{{$item->ID_dog}}" class="btn btn-light">เเก้ไข</a>
                                                
                                                <a href="/post/dog/{{$item->ID_dog}}" class="btn btn-success" >
                                            {{ __('โพสขาย') }}
                                                </a>
                                                <form action="{{ route('dog.destroy',$item->ID_dog) }}" method="GET">
                                                  @csrf
                                                  @method('DELETE')
                      
                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                          
      
      
      
                                            
                                                  
                                              @endif
                                            </div>
                                   
                                    </div>
                                  </div>
                                  
                                  


                                
                                  

                                @endforeach 
                                
                          
                          </div>
                          <!-- /.row -->
                         
                        </div>
                        
                            
                    
                      </div>
                        
                  </div>
                  <!-- /.container -->  
                      
              </div>

        
    
@endsection
