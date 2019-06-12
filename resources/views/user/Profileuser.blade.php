@extends('layouts.app')

    @section('content')


    <!-- ด้านบนหน้าร้าน -->
   
        <div class="jumbotron jumbotron-fluid bg-light" >
               

                <div class="container ">
                    
                    <div class="container">
                
                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4 ">โปรไฟล์  {{ Auth::user()->name }}</h1>
                
                            <hr class="mt-2 mb-5">

                            <div class="row text-center text-lg-left">
                                    
                            <div class="col-sm-3">          
                                <img class="img-fluid img-thumbnail" src="/storage/avatars/{{Auth::user()->Avatar}}" style="width = 50px  height: 50px border-radius: 50%"> 
                            </div> 

                        <div class="" >
                            E_mail :    {{ Auth::user()->email }}   <br>
                            ชื่อ-นาสกุล :  {{ Auth::user()->name }}  <br>
                            เบอร์โทรศัพท์ : {{ Auth::user()->Tel }} <br>
                            วันเดือนปีเกิด : {{ Auth::user()->DateofBirth }} <br>
                            ใบทะเบียนจากสมาคม : สถานะ มี <br>
                            เลขบัตรประชาชน : {{ Auth::user()->IDcardnumber }}<br>
                            ที่อยู่: {{ Auth::user()->address }}
                            
                        </div>
                        <div class="col-md-6"> <a href='{{'/{id}/edit'}}'  class="btn btn-warning">แก้ไข้ข้อมูล</a> 

                        @csrf
                        </div> 
                        <div class="col-md-7"> <a href="{{ route('dog.create')}}" class="btn btn-primary">เพิ่มสุนัข</a>
                        
                            @csrf
                            </div> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
    <header class="bg-primary text-center py-5 mb-4">
        <div class="container">
          <h1 class="font-weight-light text-white">ข้อมูล ของคุณ</h1>
        </div>
      </header>

        <div class="container-fluid ">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">โพสทั้งหมดของคุณ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">สุนัขทั้งหมดของคุณ</a>
                </li>

              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    
                        <!-- Page Content -->
                        <div class="container">
                                <div class="row">
                                  <!-- Team Member 1 -->
                                  <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-0 shadow">
                                  
                                      <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
                                      <div class="card-body text-center">
                                      <h5 class="card-title mb-0">5555</h5>
                                        <div class="card-text text-black-50">Web Developer</div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                
                                </div>
                                <!-- /.row -->
                        </div>
                              <!-- /.container -->
                </div>
                
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.

                            <!-- Related Projects Row -->
                            <h3 class="my-4">สุนัข ทั้งหมด</h3>

                          @foreach ($Dogs as $Dogs)
                            <!-- Page Features -->
                            <div class="row text-center">

                              <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100">
                                  
                                <img class="card-img-top" src="{{$Dogs->imagedog}}" alt="">
                                  
                                  <div class="card-body">
                                  <h4 class="card-title">{{$Dogs->Breed}}</h4>
                                  <img class="img-fluid img-thumbnail" src="{{$Dogs->imagedog}}" style="width = 50px  height: 50px border-radius: 50%">
                                  
                                  <p class="card-text">{{$Dogs->Detail}}</p>
                                  </div>
                                  <div class="card-footer">
                                    <a href="#" class="btn btn-light">ดูรายละเอียดเพิ่มเติม</a>
                                  </div>
                                </div>
                              </div>


                          </div>
                          <!-- /.row -->

                        
                            
                    @endforeach
                    </div>
                    <!-- /.container -->  
                          
                </div>
        </div>
        
    
@endsection
