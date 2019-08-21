@extends('layouts.app')

@section('content')


<!-- ด้านบนหน้าร้าน -->

<div class="jumbotron jumbotron-fluid bg-light">


    <div class="container ">

        <div class="container">

            <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4">โปรไฟล์</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-left">

                <div class="col-sm-3  ">
                    <img class="img-fluid img-thumbnail" src="/storage/avatars/{{ Auth::user()->Avatar }}" alt="" style="width:224px; height:224px;">
                    <form action="/{id}/updateavater" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">โปรดอัพรูปไม่เกิน 2MB.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <form method="post" action="{{'/{id}/update'}}">
                    <div class="form-group">
                        @csrf

                        <label for="name">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="Tel">เบอร์โทรศัพท์ :</label>
                        <input type="text" class="form-control" name="Tel" value="{{ Auth::user()->Tel }}" />
                    </div>
                    <div class="form-group">
                        <label for="DateofBirth">วันเดือนปีเกิด :</label>
                        <input type="date" class="form-control" name="DateofBirth" value="{{ Auth::user()->DateofBirth }}" />
                    </div>
                    <div class="form-group">
                        <label for="address">ที่อยู่ :</label>
                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" />
                    </div>
                    <div class="form-group ">
                        <div class="custom-file input-group mb-2">
                            <input type="file" name="license" class="custom-file-input" accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="">ใบอนุญาตจากสมาคม(ถ้ามี)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่ฟาร์ม</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Farmaddress"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Header -->



@endsection