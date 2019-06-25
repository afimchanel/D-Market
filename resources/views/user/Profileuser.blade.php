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
                            ใบทะเบียนจากสมาคม : สถานะ มี <br>
                            เลขบัตรประชาชน : {{ $users->IDcardnumber }}<br>
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
                  aria-controls="pills-profile" aria-selected="false" >สุนัขทั้งหมดของคุณ</a>

              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  
                      <!-- Page Content -->
                      <div class="container">
                              
                                 <!-- Sidebar -->

                                 
                                <!-- Team Member 1 -->
                             
                               @foreach ($users->posts as $item)
                               <div class="row">
                                <div class="col-lg-4 col-sm-6 mb-4">
                                  <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                    <div class="card-body">
                                      <h4 class="card-title">
                                      <a href="#"></a>
                                      </h4>
                                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                               @endforeach
                               
                               
                               
                               
                                
                                 
                                   
                               
                               
                                
                              
                             
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
                                      

                                      <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}" style="width:250px; height:250px;" >
                                    
                                      
                                      <div class="card-body">
                                      <h4 class="card-title">{{$item->Breed}}</h4>
                                      
                                      <p class="card-text">{{$item->user->address}}</p>
                                      </div>

                                              @if ($item->user->id == auth()->user()->id)
                                                  
                                              <div class="card-footer">
                                        
                                                <a href="/edit/dog/{{$item->ID_dog}}" class="btn btn-light">เเก้ไข</a>
                                                <a href="/view/dog/{{auth()->user()->id}}/{{$item->ID_dog}}" class="btn btn-light" >ดูรายละเอียด</a>
                                                <a href="/post/dog/{{$item->ID_dog}}" class="btn btn-danger" 
                                                          >
                                            {{ __('โพสขาย') }}
                                                </a>
                                                
                                                <!-- The Modal -->
                                                          
      
      
      
                                            </div>
                                                  
                                              @endif
                                   
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
