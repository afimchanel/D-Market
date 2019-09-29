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

$sliders = dogimages::where(['dog_id' => $dog->id])->get();
?>
<!-- Page Content -->
<div class="container">

  
  <!-- Heading Row -->
  <div class="row align-items-center my-5">
    <div class="col-lg-7">
        <!-- The slideshow -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          </ol>
          <div class="carousel-inner">
              @foreach($sliders as $key => $slider)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                  <img src="/storage/public/imagedog/{{$slider->image}}" class="d-block w-100"  alt="..."> 
              </div>
              @endforeach
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
        </div>
      
 
    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        
        <h1 class="font-weight-light">{{$dog->namedog}} </h1>
      <h1 class="font-weight-light">{{$post->title_post}} </h1>
      สายพันธุ์ :<a class="badge badge-success" href="/search/{{$dog->breed}}"> {{$dog->breed}}</a>
   
      <li>ลักษณะ :               
      @if ($post->type_dog == 1)
      <a class="badge badge-success" href="/search/{{$post->type_dog}}">ตัวเล็ก</a>
      @elseif ($query->type_dog == 2)
      <a class="badge badge-success" href="/search/{{$post->type_dog}}">ตัวใหญ่</a>
      @endif
      </option></li>

      <li>ราคา : {{$post->price}}</li>
      @if (Auth::user()->id == $post->user_id)
      <a href="/edit/post/{{$post->Post_id}}" class="btn btn-light">เเก้ไข</a>
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
      <p class="text-dark m-0">รายละเอียดกเกี่ยวกับสุนัขตัวนี้ : {{$post->Detail_Dog}} </p>
      <p class="text-dark m-0">พันธุ์สุนัข : {{$dog->breed}} </p>
      <p class="text-dark m-0">ราคา : {{$post->price}} </p>
      <p class="text-dark m-0">ชื่อ ฟาร์ม : {{$post->farm_name}} </p>
      <p class="text-dark m-0">เพศ :
        @if ($dog->sex == 'M')
        ตัวผู้
        @elseif($dog->sex == 'F')
        ตัวเมีย
        @endif 
      </p>
      <p class="text-dark m-0">น้ำหนัก :
        @if ($post->weight_dog == 1)
        1-5กิโล
        @elseif($post->weight_dog == 2)
        5-10กิโล
        @elseif($post->weight_dog == 3)
        มากกว่านั้น
        @endif 
      </p>
      <p class="text-dark m-0">สีสุนัข :
        @if ($dog->color = 1)
          สีขาว
        @elseif ($dog->color = 2)
          สีดำ
        @elseif ($dog->color = 3)
          อื่นๆ
        @endif
      
      </p>

      <p class="text-dark m-0">วันที่เกิด : {{$dog->birthday}} </p>
      <p class="text-dark m-0">ผู้เพาะพันธุ์ : {{$dog->owner}} </p>
      <p class="text-dark m-0">พ่อพันธุ์ : {{$dog->father}} </p>
      <p class="text-dark m-0">แม่พันธุ์ : {{$dog->momher}} </p>
    </div>
  </div>



</div>
<!-- /.container -->
@endsection