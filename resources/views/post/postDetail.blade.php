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
use App\dogvideo;

$sliders = dogimages::where(['dog_id' => $dog->idthedog])->get();
 $video = dogvideo::where(['dog_id' => $dog->idthedog])->get();
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
        สายพันธุ์ :<a class="badge badge-success" href="/search/{{$dog->breed}}">
          @if ($dog->breed == 1)
          ปั๊ก (Pug)
          @elseif($dog->breed == 2)
          ชิวาวา(Chihuahua)
          @elseif($dog->breed == 3)
          ปอมเมอเรเนียน (Pomerania)
          @elseif($dog->breed == 4)
          ชิสุ (Shih Tzu)
          @elseif($dog->breed == 5)
          ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)
          @elseif($dog->breed == 6)
          บีเกิล (Beagle)
          @elseif($dog->breed == 7)
          บูลด็อก (Bulldog)
          @elseif($dog->breed == 8)
          ไซบีเรียน ฮัสกี้ (Siberian Husky)
          @elseif($dog->breed == 9)
          โกลเด้น รีทรีฟเวอร์ (Golden Retriever)
          @elseif($dog->breed == 10)
          ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)
          @elseif($dog->breed == 11)
          อื่นๆ
          @endif
      
      </a>
      <li>ลักษณะ :               
      @if ($post->type_dog == 1)
      <a class="badge badge-success" href="">สุนัขพันธุ์เล็ก</a>
      @elseif ($post->type_dog == 2)
      <a class="badge badge-success" href="">สุนัขพันธุ์กลาง</a>
      @elseif ($post->type_dog == 3)
      <a class="badge badge-success" href="">สุนัขพันธุ์ใหญ่</a>
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

      @endif


    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->
  @foreach ($video as $item)
  <video width="400" controls>
      <source src="/storage/public/videodog/{{$item->video}}" type="video/mp4">
  </video>
  @endforeach
  <!-- Call to Action Well -->
  <div class="card text-dark bg-light my-5 py-4 text-center">
    <div class="card-body">
      <p class="text-dark m-0">รายละเอียดเกี่ยวกับสุนัขตัวนี้ : {{$post->Detail_Dog}} </p>
      <p class="text-dark m-0">ชื่อ ฟาร์ม : {{$post->farm_name}} </p>
      <p class="text-dark m-0">เพศ :
        @if ($dog->sex == '1')
        ตัวผู้
        @elseif($dog->sex == '2')
        ตัวเมีย
        @endif 
      </p>
      <p class="text-dark m-0">น้ำหนัก :
          @if ($post->weight_dog == 1)
          น้อยกว่า10กิโล
          @elseif ($post->weight_dog == 2)
          11กิโล-15กิโล
          @elseif ($post->weight_dog == 3)
          16กิโล-20กิโล
          @elseif ($post->weight_dog == 4)
          มากกว่า20กิโล
          @endif
      </p>
      <p class="text-dark m-0">สีสุนัข :
        @if ($dog->color = 1)
          สีขาว
        @elseif ($dog->color = 2)
          สีดำ
        @elseif ($dog->color = 3)
        นอกจากสีขาวและสีดำ
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