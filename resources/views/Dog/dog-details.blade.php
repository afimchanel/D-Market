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
$sliders = dogimages::where(['dog_id'=>$iddog])->get(); 
$video = dogvideo::where(['dog_id'=>$iddog])->get(); 
?>
<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">
        <small><a href="/user/{{$Dog->user_id}}">เจ้าของสุนัข</a></small>
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">
            
        <div class="col-md-8">
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

        <div class="col-md-4">
            <h3 class="my-3">รายละเอียด</h3>
            <video width="400" controls>
                    <source src="" type="video/mp4">
                    <source src="" type="video/mov">
                    Your browser does not support HTML5 video.
            </video>
            <ul>
                <li>สายพันธุ์ :<a class="badge badge-success" href="/search/{{$Dog->breed}}"> {{$Dog->breed}}</a></li>
                <li>สี :
                    @if ($Dog->color === '1')
                    <a href="#" class="badge badge-primary">ขาว</a>
                    @elseif($Dog->color === '2')
                    <a href="#" class="badge badge-primary">ดำ</a>
                    @elseif($Dog->color === '3')
                    <a href="#" class="badge badge-primary">อื่น*นอกเหนือจากสีขาวและสีดำ</a>
                    @endif
                    
                </li>
                <li>เพศ :
                    @if ($Dog->sex === 'M')
                    <a href="#" class="badge badge-secondary">ตัวผู้</a>
                    @elseif($Dog->sex === 'F')
                    <a href="#" class="badge badge-secondary">ตัวเมีย</a>
                    @endif
                </li>
                <li>พ่อพันธุ์ :<a  class="badge badge-warning" href="/view/dog/breed/{{$Dog->father}}"> {{$Dog->father}}</a> </li>
                <li>แม่พันธุ์ : {{$Dog->momher}}</li>
                ดูสายพันของตัวนี้
                <li>วันเกิด :{{$Dog->birthday}}</li>
                <li>
                    ใบCP : @if ($Dog->imageCP = 'noimage.jpg' )
                    <span class="badge badge-pill badge-danger">ไม่มี</span>
                    @else
                    <span class="badge badge-pill badge-success">มี</span>
                    @endif
                </li>
                <li>
                    ใบRC : @if ($Dog->imageRC = 'noimage.jpg' )
                    <span class="badge badge-pill badge-danger">ไม่มี</span>
                    @else
                    <span class="badge badge-pill badge-success">มี</span>
                    @endif
                </li>

            </ul>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


@endsection