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

<div class="container  text-center ">

        <h1 class="text-center">กรอกข้อมูลโพสสุนัขเพื่อขาย</h1>
        <img class="img-fluid img-thumbnai" src="/storage/public/imagecover/{{$post->image}}" style="width:500px; height:500px;">
        <form method="post" action="/{{auth()->user()->id}}/{{$post->id}}/create/post" enctype="multipart/form-data" class="text-center container" novalidate>
                @csrf

                <div class="container">
                        <div class="col-md-4">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">ราคา</div>
                                        </div>
                                        <input type="text" class="form-control" @error('price') is-invalid @enderror placeholder="ราคาตามสายพันธุ์" name="price">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>กรุณากรอกราคา</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="col-md-4">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text" name='type_dog' required>ลักษณะ</div>
                                        </div>
                                        <select class="custom-select" name='type_dog'>
                                                <option >เลือกลักษณะ</option>
                                                <option value="1">สุนัขพันธุ์เล็ก</option>
                                                <option value="2">สุนัขพันธุ์กลาง</option>
                                                <option value="3">สุนัขพันธุ์ใหญ่</option>

                                        </select>
                                </div>
                        </div>

                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">อายุสุนัขหน่วยเป็นวัน</div>
                                        </div>
                                        <select class="custom-select" name="Age_Dog">
                                                <option>เลือกอายุสุนัข</option>
                                                <option value="1">น้อยกว่า10วัน</option>
                                                <option value="2">11-20วัน</option>
                                                <option value="3">21-30วัน</option>
                                                <option value="4">31-40วัน</option>
                                                <option value="5">41-50วัน</option>
                                                <option value="6">มากกว่า50วัน</option>
                                        </select>

                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">สีตา</div>
                                        </div>
                                        <select class="custom-select" name="eye_color">
                                                <option>เลือกสีตา</option>
                                                <option value="1">สีดำ</option>
                                                <option value="2">สีน้ำตาล</option>
                                                <option value="3">สีฟ้า</option>
                                                <option value="4">สีน้ำตาลอ่อน</option>
                                                <option value="5">สีน้ำตาลเข้ม</option>
                                                <option value="6">สีน้ำตาล – สีฟ้า</option>
                                                <option value="7">สีน้ำตาล- สีเขียว</option>
                                                <option value="8">สีน้ำตาลเข้ม- สีน้ำตาลอ่อน</option>
                                        </select>
                                        
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">น้ำหนัก</div>
                                        </div>
                                        <select class="custom-select" name="weight_dog">
                                                <option >เลือกน้ำหนัก</option>
                                                <option value="1">น้อยกว่า10กิโล</option>
                                                <option value="2">11กิโล-15กิโล</option>
                                                <option value="3">16กิโล-20กิโล</option>
                                                <option value="4">มากกว่า20กิโล</option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">ชื่อฟาร์ม</div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="ชื่อฟาร์มมีหรือไม่มีก็ได้" name='farm_name'>
                                </div>
                        </div>
                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">เบอร์โทรติดต่อ</div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="เบอร์โทรติดต่อ" @error('tel_post') is-invalid @enderror name="tel_post">
                                        @error('tel_post')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>กรุณากรอก</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">วัคชีน</div>
                                        </div>
                                        <select class="custom-select" name="vaccine">
                                                <option >เลือกจำนวนการฉีด</option>
                                                <option value="1">ฉีด 1 ครั้ง</option>
                                                <option value="2">ฉีด 2 ครั้ง</option>
                                                <option value="3">ฉีด 3 ครั้ง</option>
                                        </select>
                                </div>
                        </div>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">รายละเอียดเกี่ยวกับสุนัข</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name='Detail_Dog'></textarea>
                        </div>

                </div>



                <div class="container">
                        <div class="row">
                                <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">ตกลง</button>
                                </div>
                        </div>
                </div>





        </form>
</div>


@endsection