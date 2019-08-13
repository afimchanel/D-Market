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
                                <h1 class="my-4">
                                <small><a href="/user/{{$Dog->user_id}}">เจ้าของสุนัข</a></small>
                                </h1>
                                
                        <!-- Portfolio Item Row -->
                        <div class="row">

                                <div class="col-md-8">
                                <img class="img-fluid" src="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}" style="width:750px; height:500px;">
                               
                                </div>
                            
                                <div class="col-md-4">
                                <h3 class="my-3">รายละเอียด</h3>
                            
                                <ul>
                                    <li>สายพันธุ์ :{{$Dog->Breed}}</li>
                                    <li>สี :
                                        
                                        {{$Dog->color}}
                                     </li>
                                    <li>เพศ :
                                        @if ($Dog->SEX === 'M')
                                            ตัวผู้
                                        @elseif($Dog->SEX === 'F')
                                            ตัวเมีย
                                        @endif
                                    </li>
                                <li>พ่อพันธุ์ :<a href="/view/dog/breed/{{$Dog->Father}}">{{$Dog->Father}}</a> </li>
                                    <li>แม่พันธุ์ : {{$Dog->Momher}}</li>
                                    <li>วันเกิด :{{$Dog->birthday}}</li>
                                    <li>
                                        ใบCP : @if ($Dog->imageCP = 'noimage.jpg' )
                                        ไม่มี
                                    @else
                                        มี
                                    @endif
                                    </li>
                                    <li>
                                        ใบRC : @if ($Dog->imageRC = 'noimage.jpg' )
                                        ไม่มี
                                    @else
                                        มี
                                    @endif
                                    </li>
                                    
                                </ul>
                                
                                </div>
                            
                            </div>
                            <!-- /.row -->
                            
                            </div>
                            <!-- /.container -->
            @endsection