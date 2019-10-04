@extends('layouts.app')
<style>
    /*#region Organizational Chart*/
    .tree * {
        margin: 0;
        padding: 0;
    }

    .tree ul {
        padding-top: 20px;
        position: relative;

        -transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;

        -transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree li::before,
    .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 2px solid #696969;
        width: 50%;
        height: 20px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 2px solid #696969;
    }

    /*We need to remove left-right connectors from elements without 
                any siblings*/
    .tree li:only-child::after,
    .tree li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child {
        padding-top: 0;
    }

    /*Remove left connector from first child and 
                right connector from last child*/
    .tree li:first-child::before,
    .tree li:last-child::after {
        border: 0 none;
    }

    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before {
        border-right: 2px solid #696969;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 2px solid #696969;
        width: 0;
        height: 20px;
    }

    .tree li a {
        height: 100px;
        width: 200px;
        padding: 5px 10px;
        text-decoration: none;
        background-color: white;
        color: #8b8b8b;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);

        -transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover,
    .tree li a:hover+ul li a {
        background: #cbcbcb;
        color: #000;
    }

    /*Connector styles on hover*/
    .tree li a:hover+ul li::after,
    .tree li a:hover+ul li::before,
    .tree li a:hover+ul::before,
    .tree li a:hover+ul ul::before {
        border-color: #94a0b4;
    }

    /*#endregion*/
</style>
<?php


use App\post;


?>
@section('content')

<!-- ด้านบนหน้าร้าน -->

<div class="jumbotron jumbotron-fluid  ">

    
    <div class="container ">
        <div class="container">

            <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4 ">โปรไฟล์ {{ $users->name }}</h1>
            <hr class="mt-2 mb-5">
            <div class="row text-center text-lg-left">
                <div class="col-sm-3">
                    <img class="img-fluid img-thumbnail" src="/storage/avatars/{{$users->Avatar}}" style="width:300px; height:250px;">
                </div>
                <div class="">

                    E_mail : {{ $users->email }} <br>
                    ชื่อ-นาสกุล : {{ $users->name }} <br>
                    เบอร์โทรศัพท์ : {{ $users->Tel }} <br>
                    วันเดือนปีเกิด : {{ $users->DateofBirth }} <br>
                    @if ($users->license == 'noimage.jpg' || $users->license == NULL)
                    ใบทะเบียนจากสมาคม : สถานะ ไม่มี <br>
                    @else
                    ใบทะเบียนจากสมาคม : สถานะ มี <br>
                    @endif
                    ที่อยู่:
                        @if ($users->address === NULL )
                            @if ($users->id === Auth::user()->id)
                            <div class="alert alert-danger" role="alert">
                                กรุณากรอกที่อยู่ !!
                            </div>
                            @endif
                        @else
                        {{ $users->address }} <br>
                        @endif
                        @if ($users->id === Auth::user()->id)
                        <a href="/buying"><button>การชื้อของ{{ $users->name }} </button></a>
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="bg-warning
    text-center py-5 md-4">
    <div class="container bg-warning">
        <h1 class="font-weight-light text-white ">ข้อมูล ของคุณ</h1>
    </div>
</header>

<div class="container py-5 md-4">
    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">โพสทั้งหมดของคุณ</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ลูกสุนัขทั้งหมด</a>

        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            <!-- Page Content -->
            <div class="container">

                <!-- Team Member 1 -->
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="px-1 ">
                        <div class="card h-100">
                            <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">
                                <img class="card-img-top" src="/storage/public/imagecover/{{$item->image}}" style="width:250px; height:250px;">
                            </a>

                            <div class="card-body text-center">
                                <h4 class="card-title ">
                                <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">{{$item->namedog}}</a>
                                
                                    @if ($item->order_id == NULL )
                                    <span class="badge badge-success">สถานะ : ปกติ</span>
                                    @elseif ($item->order_id !== NULL && $item->Status == 0)
                                    <span class="badge badge-warning">สถานะ : รอจ่ายเงิน</span>
                                    @elseif ($item->Status == 0)
                                    <span class="badge badge-warning">สถานะ : รอยืนยันการจ่ายเงิน</span>
                                    @elseif ($item->Status == 1)
                                    <span class="badge badge-warning">สถานะ : รอส่งสุนัข</span>
                                    @elseif ($item->Status == 3)
                                    <span class="badge badge-warning">สถานะ : ส่งสุนัขแล้ว</span>
                                    @elseif ($item->Status == 2)
                                    <span class="badge badge-danger">สถานะ : ขายแล้ว</span>
                                    @endif


                                </h4>
                                @if ($item->user_id == auth()->user()->id)
                                <a href="/edit/post/{{$item->Post_id}}" class="btn btn-light">เเก้ไข</a>
                                @endif
                                <p class="card-text">{{$item->Detail_Dog}}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <!-- /.container -->
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <!-- Related Projects Row -->
            <div class="container">


                <!-- Page Features -->
                <div class="row text-center">

                    @foreach ($Dogs as $item)

                    <div class="col-lg-3 col-md-6 mb-4 ">
                        <div class="card h-100">

                            <img class="card-img-top" src="/storage/public/imagecover/{{$item->image}}" style="width:250px; height:250px;">
                            <div class="card-body">
                                <h4 class="card-title">{{$item->namedog}}</h4>
                                <!--<p class="card-text"></p>-->
                            </div>
                            <div class="card-footer">
                                <a href="/view/dog/{{$item->idthedog}}" class="btn btn-light">ดูรายละเอียด</a>
                                @if ($item->user_id == auth()->user()->id)
                                <a href="/edit/dog/{{$item->id}}" class="btn btn-light">เเก้ไข</a>
                                <?php $chk = post::where('id_the_dog',$item->id)->get('id_the_dog'); ?>
                                @if ($chk == '[]')
                                <div class="card">
                                    <a href="/post/dog/{{$item->id}}/{{auth()->user()->id}}" class="btn btn-success">
                                        {{ __('โพสขาย') }}
                                    </a>
                                </div>
                                @elseif(isset($chk))

                                @endif

                                <form action="/delete/dog/{{$item->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="card">
                                        <button type="submit" class="btn btn-danger @error('Delete') is-invalid @enderror">Delete</button>
                                    </div>
                                </form>

                                @endif

                            </div>
                        </div>
                    </div>


                    @endforeach
                </div>
                {{$Dogs->links()}}
                <!-- /.row -->
            </div>
        </div>


    </div>
    <!-- /.container -->

</div>



@endsection