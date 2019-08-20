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
        <small><a href="/user/{{$details->user_id}}">เจ้าของสุนัข</a></small>
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="/storage/public/imagedog/cover_images/{{$details->imagedog}}" style="width:750px; height:500px;">

        </div>

        <div class="col-md-4">
            <h3 class="my-3">รายละเอียด</h3>

            <ul>
                <li>สายพันธุ์ :{{$Dog->breed}}</li>
                <li>สี :

                    {{$Dog->color}}
                </li>
                <li>เพศ :
                    @if ($Dog->sex === 'M')
                    ตัวผู้
                    @elseif($Dog->sex === 'F')
                    ตัวเมีย
                    @endif
                </li>
                laravel display multiple images a-slideshow
                <li>พ่อพันธุ์ :<a href="/view/dog/breed/{{$Dog->Father}}">{{$Dog->father}}</a> </li>
                <li>แม่พันธุ์ : {{$Dog->momher}}</li>
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