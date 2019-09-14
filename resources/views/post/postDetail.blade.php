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
<?php
use App\dogimages;
$sliders = dogimages::where(['dog_id'=>$dog->id])->get(); 
?>
<!-- Page Content -->
<div class="container">

  <!-- Heading Row -->
  <div class="row align-items-center my-5">
      <div class="col-lg-7">
          <div id="demo" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ol>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                      @foreach($sliders as $key => $slide)
                      <div class="item active {{ $key == 0 ? ' active' : '' }}">
                          <img class="img-fluid" src="/storage/public/imagedog/{{$slide->image}}" style="width:750px; height:500px;">
                      </div>
                      @endforeach
                </div>
              </div>
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
          </div>
      </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-5">

      <h1 class="font-weight-light">{{$post->title_post}}</h1>
      สายพันธุ์ :{{$dog->breed}}
      <p>รายละเอียด : {{$post->Detail_Dog}}</p>
      <li>ลักษณะ : {{$post->type_dog}}</li>

      <li>ราคา : {{$post->price}}</li>
      @if (Auth::user()->id == $post->user_id)
      <a href="" class="btn btn-light">เเก้ไข</a>
      @else
      
      <div class="btn-group cart">
          <a href="/create/order/{{ Auth::user()->id}}/{{ $dog->id }}/{{$post->Post_id}}">
          <button type="button" class="btn btn-success">
            เพิ่มลงในตะกร้า
          </button>
        </a>
        </div>
        <div class="btn-group wishlist">
          <button type="button" class="btn btn-danger">
            Add to wishlist 
          </button>
        </div>
      
      @endif


    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->
  <video width="400" controls>
      <source src="mov_bbb.mp4" type="video/mp4">
      <source src="mov_bbb.ogg" type="video/ogg">
      Your browser does not support HTML5 video.
  </video>
    <!-- Call to Action Well -->
    <div class="card text-dark bg-light my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-dark m-0">รายละเอียดกเกี่ยวกับสุนัขตัวนี้ {{$post->Detail_Dog}} </p>
        <p class="text-dark m-0">พันธุ์สุนัข : {{$dog->breed}} </p>
        <p class="text-dark m-0">ราคา : {{$post->price}} </p>
        <p class="text-dark m-0">ใบอนุญาตจากสมาคม : {{$post->breed}} </p>
        <p class="text-dark m-0">ชื่อ ฟาร์ม : {{$post->farm_name}} </p>
        <p class="text-dark m-0">เพศ :
          @if ($dog->sex === 'M')
          ตัวผู้
          @elseif($dog->sex === 'F')
          ตัวเมีย
          @endif </p>
        <p class="text-dark m-0">สีสุนัข : {{$dog->color}} </p>
        <p class="text-dark m-0">วันที่เกิด : {{$dog->birthday}} </p>
        <p class="text-dark m-0">ผู้เพาะพันธุ์ : {{$dog->owner}} </p>
        <p class="text-dark m-0">พ่อพันธุ์ : {{$dog->father}} </p>
        <p class="text-dark m-0">แม่พันธุ์ : {{$dog->momher}} </p>
        <p class="text-dark m-0">อยู่ที่ฟาร์ม : {{$dog->registrationdate}} </p>


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