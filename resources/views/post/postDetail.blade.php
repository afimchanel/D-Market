@extends('layouts.app')


@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
        
     <!-- Page Content -->
  <div class="container">

                <!-- Heading Row -->
                <div class="row align-items-center my-5">
                  
                  <div class="col-lg-7">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="http://placehold.it/900x400" alt="">
                  </div>
                  <!-- /.col-lg-8 -->
                  <div class="col-lg-5">

                  <h1 class="font-weight-light">{{$posts->title_post}}</h1>
                    <p>{{$posts->Detail_Dog}}</p>
                    <li>{{$posts->type_dog}}</li>
                    
                    <li>ราคา : {{$posts->price}}</li>
                    <a class="btn btn-success" href="">ชื้อ</a>
                  </div>
                  <!-- /.col-md-4 -->
                </div>
                <!-- /.row -->
            
                <!-- Call to Action Well -->
                <div class="card text-dark bg-light my-5 py-4 text-center">
                  <div class="card-body">
                    <p class="text-dark m-0">รายละเอียดกเกี่ยวกับสุนัขตัวนี้ </p>
                    ะประกอบด้วย พันธุ์สุนัข,รำคำ,วัคชีน, ใบอนุญำตจำกสมำคม(ถ้ำมี),ชื่อฟำร์ม,เพศของสุนัข,เลขทะเบียน,สีสุนัข,    วันที่เกิด,ผู้เพำะพันธุ์,พ่อพันธุ์,แม่พันธุ์,ที่อยู่ฟำร์ม,รูปภำพ,วีดิโอ,รำยละเอียด เพิ่มเติมของสุนัข,เบอร์ตดิต่อ
                    
                  </div>
                </div>
            
                <!-- Content Row -->
                <div class="row">
                  <div class="col-md-4 mb-5">
                    <div class="card h-100">
                      <div class="card-body">
                        <h2 class="card-title">Card One</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.col-md-4 -->
                  <div class="col-md-4 mb-5">
                    <div class="card h-100">
                      <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.col-md-4 -->
                  <div class="col-md-4 mb-5">
                    <div class="card h-100">
                      <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.col-md-4 -->
            
                </div>
                <!-- /.row -->
            
              </div>
              <!-- /.container -->
@endsection