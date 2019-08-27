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
        <img class="img-fluid img-thumbnai" src="/storage/public/imagedog/cover_images/{{$post->imagedog}}" style="width:500px; height:500px;">
        <form method="post" action="/{{{auth()->user()->id}}}/{{$post->ID_dog}}/create/post" enctype="multipart/form-data" class="text-center container" novalidate>
                @csrf

                <div class="container">

                        <div class="col-md-4">
                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">หัวข้อโพสขาย</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup1" placeholder="หัวข้อโพสขาย" name="title_post">
                                </div>
                        </div>
                        <div class="col-md-4">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">ราคา</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup2" placeholder="ราคาตามสาพันธุ์" name="price">
                                </div>
                        </div>
                        <div class="col-md-4">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text" name='type_dog' required>ลักษณะ</div>
                                        </div>
                                        <select class="custom-select" name='type_dog'>
                                                <option selected>เลือกขนาด</option>
                                                <option value="1">ตัวเล็ก</option>
                                                <option value="2">ตัวใหญ่</option>

                                        </select>
                                </div>
                        </div>

                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">อายุสุนัข(ตอนนี้)หน่วยเป็นเดือน</div>
                                        </div>
                                        <select class="custom-select" name="Age_Dog">
                                                <option selected>เลือกสีตา</option>
                                                <option value="1">1-2</option>
                                                <option value="2">3-4</option>
                                                <option value="3">5-6</option>
                                                <option value="4">อื่นๆ</option>
                                        </select>

                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">สีตา</div>
                                        </div>
                                        <select class="custom-select" name="eye_color">
                                                <option selected>เลือกสีตา</option>
                                                <option value="1">ดำ</option>
                                                <option value="2">น้ำตาล</option>
                                                <option value="3">ฟ้า</option>
                                                <option value="4">อื่นๆ</option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">น้ำหนัก</div>
                                        </div>
                                        <select class="custom-select" name="weight_dog">
                                                <option selected>เลือกน้ำหนัก</option>
                                                <option value="1">1-5 กิโล</option>
                                                <option value="2">5-10 กิโล</option>
                                                <option value="3">มากว่านั้น</option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">ชื่อฟาร์ม</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup4" placeholder="ชื่อฟาร์ม" name='farm_name'>
                                </div>
                        </div>
                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">เบอร์โทรติดต่อ</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup5" placeholder="เบอร์โทรติดต่อ" name="tel_post">
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">วัคชีน</div>
                                        </div>
                                        <select class="custom-select" name="vaccine">
                                                <option selected>เลือกจำนวนการฉีด</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
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