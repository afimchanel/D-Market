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

                                <!-- Portfolio Item Heading -->
                                <h1 class="my-4">เจ้าของสุนัข
                                <small><a href="/user/{{$user->id}}">{{$user->name}}</a></small>
                                </h1>
                                <h4>ชื่อtitle โพส</h4>
                        <!-- Portfolio Item Row -->
                        <div class="row">

                                <div class="col-md-8">
                                <img class="img-fluid" src="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}" style="width:750px; height:500px;">
                               
                                </div>
                            
                                <div class="col-md-4">
                                <h3 class="my-3">รายละเอียดคำอธิบายของสุนัขตัวนี้</h3>
                                <p>{{$Dog->Detail}}</p>
                                <h3 class="my-3">ลักษณะสุนัข</h3>
                                <ul>
                                    <li>Lorem Ipsum</li>
                                    <li>Dolor Sit Amet</li>
                                    <li>Consectetur</li>
                                    <li>Adipiscing Elit</li>
                                </ul>
                                <button type="button" class="btn btn-success">ชื้อ</button>
                                </div>
                            
                            </div>
                            <!-- /.row -->
                            





                            <!-- Related Projects Row -->
                            <h3 class="my-4">สุนัขที่ {{$user->name}} เป็นเจ้าของ</h3>
                            
                            <div class="row">
                                @foreach ($Dog as $item)
                                <div class="col-md-3 col-sm-6 mb-4">
                                        <a href="#">
                                                <img class="img-fluid" src="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}" style="width:500px; height:300px;" >
                                                
                                            </a>
                                        </div>
                                @endforeach
                                
                            
                             
                            
                            </div>
                            <!-- /.row -->
                            <h3 class="my-4">สุนัขที่คล้ายๆกัน</h3>
                            
                            <div class="row">
                            
                                <div class="col-md-3 col-sm-6 mb-4">
                                <a href="#">
                                        <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                                    </a>
                                </div>
                            
                             
                            
                            </div>
                            
                            </div>
                            <!-- /.container -->
            @endsection