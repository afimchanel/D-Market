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

$sliders = dogimages::where(['dog_id' => $iddog])->get();
$video = dogvideo::where(['dog_id' => $iddog])->get();
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
                <li>พ่อพันธุ์ :<a class="badge badge-warning" href="/view/dog/breed/{{$Dog->father}}"> {{$Dog->father}}</a> </li>
                <li>แม่พันธุ์ : {{$Dog->momher}}</li>
                ดูสายพันของตัวนี้
                <li>วันเกิด :{{$Dog->birthday}}</li>
                <li>
                    ใบCP : @if ($Dog->imageCP == 'noimage.jpg' )
                    <span class="badge badge-pill badge-danger">ไม่มี</span>
                    @else
                    <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#CP" >ดู</button >
                                <!-- Modal -->
                                <div class="modal fade" id="CP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
        
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                    <img src="/storage/public/imagedog/{{$Dog->imageCP}}" class="d-block w-100"  alt="..."> 
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                    @endif
                </li>
                <li>
                    ใบRC : @if ($Dog->imageRC == 'noimage.jpg' )
                    <span class="badge badge-pill badge-danger" >ไม่มี</span>
                    
                    @else
                    <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#RC" >ดู</button >
                        <!-- Modal -->
                        <div class="modal fade" id="RC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                            <img src="/storage/public/imagedog/imageRC/{{$Dog->imageRC}}" class="d-block w-100"  alt="..."> 
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                                    </div>
                                </div>
                                </div>
                            </div>
                    @endif

                </li>

            </ul>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


@endsection