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
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="/storage/public/imagedog/cover_images/{{$dog->imagedog}}" style="width:900px; height:400px;">
                  </div>
                  <!-- /.col-lg-8 -->
                  <div class="col-lg-5">

                  <h1 class="font-weight-light">{{$dog->Breed}}{{$post->title_post}}</h1>
                    <p>รายละเอียด : {{$post->Detail_Dog}}</p>
                    <li>ลักษณะ : {{$post->type_dog}}</li>
                    
                    <li>ราคา : {{$post->price}}</li>
                    <a class="btn btn-success" href="/create/order/{{ Auth::user()->id}}/{{ $dog->ID_dog }}/{{$post->Post_id}}"
                      >ชื้อ</a>
                  </div>
                  <!-- /.col-md-4 -->
                </div>
                <!-- /.row -->
            
                <!-- Call to Action Well -->
                <div class="card text-dark bg-light my-5 py-4 text-center">
                  <div class="card-body">
                    <p class="text-dark m-0">รายละเอียดกเกี่ยวกับสุนัขตัวนี้ {{$post->Detail_Dog}} </p>
                    <p class="text-dark m-0">พันธุ์สุนัข : {{$dog->Breed}} </p>
                    <p class="text-dark m-0">ราคา : {{$post->Breed}} </p>
                    <p class="text-dark m-0">ใบอนุญาตจากสมาคม(ถ้ามี) : {{$post->Breed}} </p>
                    <p class="text-dark m-0">ชื่อ ฟาร์ม : {{$dog->Farm_name}} </p>
                    <p class="text-dark m-0">เพศ : {{$dog->Breed}} </p>
                    <p class="text-dark m-0">สีสุนัข : {{$post->Breed}} </p>
                    <p class="text-dark m-0">วันที่เกิด : {{$dog->birthday}} </p>
                    <p class="text-dark m-0">ผู้เพาะพันธุ์ : {{$dog->Owner}} </p>
                    <p class="text-dark m-0">พ่อพันธุ์ : {{$dog->Father}} </p>
                    <p class="text-dark m-0">แม่พันธุ์ : {{$dog->Momher}} </p>
                    <p class="text-dark m-0">อยู่ที่ฟาร์ม : {{$dog->Registrationdate}} </p>
                    <p class="text-dark m-0">เบอร์โทรติดต่อ : {{$post->Breed}} </p>
                    
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