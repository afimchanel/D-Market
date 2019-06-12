@extends('layouts.app')

    @section('content')


    <!-- ด้านบนหน้าร้าน -->
   
        <div class="jumbotron jumbotron-fluid bg-light" >
               

                <div class="container ">
                    
                    <div class="container">
                
                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4">โปรไฟล์</h1>
                
                            <hr class="mt-2 mb-5">

                            <div class="row text-center text-lg-left">
                                    
                            <div class="col-sm-3  ">          
                                <img class="img-fluid img-thumbnail" src="/image/pug.jpg" alt="" style="width:224px; height:224px;"> 
                                  <form action="/{id}/updateavater" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">โปรดอัพรูปไม่เกิน 2MB.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                              </div> 
                            <form method="post" action="{{'/{id}/update'}}">
                              <div class="form-group">
                                  @csrf

                                  <label for="name">Name :</label>
                                  <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"/>
                              </div>
                              <div class="form-group">
                                  <label for="Tel">เบอร์โทรศัพท์ :</label>
                                  <input type="text" class="form-control" name="Tel" value="{{ Auth::user()->Tel }}"/>
                              </div>
                              <div class="form-group">
                                  <label for="DateofBirth">วันเดือนปีเกิด :</label>
                                  <input type="date" class="form-control" name="DateofBirth" value="{{ Auth::user()->DateofBirth }}"/>
                              </div>
                              <div class="form-group">
                                <label for="address">ที่อยู่ :</label>
                                <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}"/>

                            </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                            </div> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
    <header class="bg-primary text-center py-5 mb-4">
        <div class="container">
          <h1 class="font-weight-light text-white">Meet the Team</h1>
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
                          <h5 class="card-title mb-0">Team Member</h5>
                          <div class="card-text text-black-50">Web Developer</div>
                        </div>
                      </div>
                    </div>
                    <!-- Team Member 2 -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-0">Team Member</h5>
                          <div class="card-text text-black-50">Web Developer</div>
                        </div>
                      </div>
                    </div>
                    <!-- Team Member 3 -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-0">Team Member</h5>
                          <div class="card-text text-black-50">Web Developer</div>
                        </div>
                      </div>
                    </div>
                    <!-- Team Member 4 -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title mb-0">Team Member</h5>
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
                        
                            <div class="row">
                        
                            <div class="col-md-3 col-sm-6 mb-4">
                                <a href="#">
                                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                                    </a>
                            </div>
                        
                            <div class="col-md-3 col-sm-6 mb-4">
                                <a href="#">
                                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                                    </a>
                            </div>
                        
                            <div class="col-md-3 col-sm-6 mb-4">
                                <a href="#">
                                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                                    </a>
                            </div>
                        
                            <div class="col-md-3 col-sm-6 mb-4">
                                <a href="#">
                                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                                    </a>
                            </div>
                        
                            </div>
                            <!-- /.row -->
                        
                        </div>
                        <!-- /.container -->

                </div>
        </div>
        
    
@endsection
