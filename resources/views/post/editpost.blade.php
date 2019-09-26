@extends('layouts.app')
@section('content')


<div class="container  text-center ">

        <h1 class="text-center">แก้ไขข้อมูล</h1>
        {{$post->Post_id}}
        <a href="/edit/dog/{{$post->id_the_dog}}" class="btn btn-light">เเก้ไขนอกจากนี้</a>
        <form action="/update/post/{{$post->Post_id}}" enctype="multipart/form-data" class="text-center container">
                @csrf
                <div class="container">

                        <div class="col-md-4">
                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">หัวข้อโพสขาย</div>
                                        </div>
                                        <input type="text" class="form-control" value="{{$post->title_post}}" name="title_post">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">ราคา</div>
                                        </div>
                                        <input type="text" class="form-control" name="price" value="{{$post->price}}">
                                </div>
                        </div>
                        <div class="col-md-4">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text" name='type_dog' required>ลักษณะ</div>
                                        </div>
                                        <select class="custom-select" name='type_dog'>
                                                <option selected>
                                                        @if ($post->type_dog = 1)
                                                        ตัวเล็ก
                                                        @elseif ($post->type_dog = 2)
                                                        ตัวใหญ่
                                                        @endif
                                                </option>
                                                <option value="1">ตัวเล็ก</option>
                                                <option value="2">ตัวใหญ่</option>

                                        </select>
                                </div>
                        </div>

                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">อายุสุนัขหน่วยเป็นวัน</div>
                                        </div>
                                        <select class="custom-select" name="Age_Dog">
                                                <option selected>เลือกอายุสุนัข
                                                        @if ($post->Age_Dog !== 2 && $post->Age_Dog !== 3 && $post->Age_Dog !== 4)
                                                        {{$post->Age_Dog}}
                                                        @elseif ($post->Age_Dog == 2)
                                                        30-49 วัน
                                                        @elseif ($post->Age_Dog == 3)
                                                        50-65 วัน
                                                        @elseif ($post->Age_Dog == 4)
                                                        เกินกว่านั้น

                                                        @endif
                                                </option>

                                                <option value="2">30-49</option>
                                                <option value="3">50-65</option>
                                                <option value="4">เกินกว่านั้น</option>
                                        </select>

                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">สีตา</div>
                                        </div>
                                        <select class="custom-select" name="eye_color">
                                                <option selected>
                                                        @if ($post->eye_color = 1)
                                                        สีดำ
                                                        @elseif ($post->eye_color = 2)
                                                        สีน้ำตาล
                                                        @elseif ($post->eye_color = 3)
                                                        สีฟ้า
                                                        @elseif ($post->eye_color = 4)
                                                        นอกเหนือจากนี้
                                                        @endif
                                                </option>
                                                <option value="1">ดำ</option>
                                                <option value="2">น้ำตาล</option>
                                                <option value="3">ฟ้า</option>
                                                <option value="4">นอกเหนือจากนี้</option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">น้ำหนัก</div>
                                        </div>
                                        <select class="custom-select" name="weight_dog">
                                                <option selected>
                                                        @if ($post->weight_dog = 1)
                                                        1-5 กิโล
                                                        @elseif ($post->weight_dog = 2)
                                                        5-10 กิโล
                                                        @elseif ($post->weight_dog = 3)
                                                        มากว่านั้น
                                                        @endif
                                                </option>
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
                                        <input type="text" class="form-control" name='farm_name' value="{{$post->farm_name}}">
                                </div>
                        </div>
                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">เบอร์โทรติดต่อ</div>
                                        </div>
                                        <input type="text" class="form-control" name="tel_post" value="{{$post->tel_post}}">
                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">วัคชีน</div>
                                        </div>
                                        <select class="custom-select" name="vaccine">
                                                <option selected>
                                                        @if ($post->vaccine == 1)
                                                        1ครั่ง
                                                        @elseif ($post->vaccine == 2)
                                                        2ครัง
                                                        @elseif ($post->vaccine == 3)
                                                        3ครั่ง
                                                        @endif
                                                </option>
                                                <option value="1">1ครั่ง</option>
                                                <option value="2">2ครั่ง</option>
                                                <option value="3">3ครั่ง</option>

                                        </select>
                                </div>
                        </div>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">รายละเอียดเกี่ยวกับสุนัข</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name='Detail_Dog'>{{$post->Detail_Dog}}</textarea>
                        </div>

                </div>




                <div class="col text-center">
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>






        </form>
</div>

@endsection