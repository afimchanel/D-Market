@extends('layouts.app')

@section('content')


<div class="container  text-center ">

        <h1 class="text-center">แก้ไขข้อมูล</h1>

        <form action="/update/post/{{$post->Post_id}}" enctype="multipart/form-data" class="text-center container">
                @csrf
                <div class="container">
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
 
                                                        @if ($post->type_dog = 1)
                                                        <option value="1" selected>ตัวเล็ก</option>
                                                        @elseif ($post->type_dog = 2)
                                                        <option value="2" selected>ตัวใหญ่</option>
                                                        @endif                                               
                                                        <option value="1">ตัวเล็ก</option>
                                                        <option value="2">ตัวใหญ่</option>

                                        </select>
                                </div>
                        </div>

                        <div class="col-auto">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">อายุสุนัข(หน่วยเป็นวัน)</div>
                                        </div>
                                        <select class="custom-select" name="Age_Dog">
                                                
                                                        @if ($post->Age_Dog == 1)
                                                        <option value="1" selected>น้อยกว่า10วัน</option>
                                                        @elseif ($post->Age_Dog == 2)
                                                        <option value="2" selected>11-20วัน</option>
                                                        @elseif ($post->Age_Dog == 3)
                                                        <option value="3" selected>21-30วัน</option>
                                                        @elseif ($post->Age_Dog == 4)
                                                        <option value="4" selected>31-40วัน</option>
                                                        @elseif ($post->Age_Dog == 5)
                                                        <option value="5" selected>41-50วัน</option>
                                                        @elseif ($post->Age_Dog == 6)
                                                        <option value="6" selected>มากกว่า50วัน</option>
                                                        @endif
                                                        <option value="1" >น้อยกว่า10วัน</option>
                                                        <option value="2" >11-20วัน</option>
                                                        <option value="3" >21-30วัน</option>
                                                        <option value="4" >31-40วัน</option>
                                                        <option value="5" >41-50วัน</option>
                                                        <option value="6" >มากกว่า50วัน</option>
                                        </select>

                                </div>
                        </div>
                        <div class="col-2">

                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text">สีตา</div>
                                        </div>
                                        <select class="custom-select" name="eye_color">                           
                                                        @if ($post->eye_color == 1)
                                                        <option value="1" selected>สีดำ</option>
                                                        @elseif ($post->eye_color == 2)
                                                        <option value="2" selected>สีน้ำตาล</option>
                                                        @elseif ($post->eye_color == 3)
                                                        <option value="3" selected>สีฟ้า</option>
                                                        @elseif ($post->eye_color == 4)
                                                        <option value="4" selected>สีน้ำตาลอ่อน</option>
                                                        @elseif ($post->eye_color == 5)
                                                        <option value="5" selected>สีน้ำตาลเข้ม</option>
                                                        @elseif ($post->eye_color == 6)
                                                        <option value="6" selected>สีน้ำตาล – สีฟ้า</option>
                                                        @elseif ($post->eye_color == 7)
                                                        <option value="7" selected>สีน้ำตาล- สีเขียว</option>
                                                        @elseif ($post->eye_color == 8)
                                                        <option value="8" selected>สีน้ำตาลเข้ม- สีน้ำตาลอ่อน</option>
                                                        @endif
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
                                                @if ($post->weight_dog == 1)
                                                <option value="1" selected>น้อยกว่า10กิโล</option>
                                                @elseif ($post->weight_dog == 2)
                                                <option value="2" selected>11กิโล-15กิโล</option>
                                                @elseif ($post->weight_dog == 3)
                                                <option value="3" selected>16กิโล-20กิโล</option>
                                                @elseif ($post->weight_dog == 4)
                                                <option value="4" selected>มากกว่า20กิโล</option>
                                                @endif
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

                                                @if ($post->vaccine == 1)
                                                <option value="1" selected>ฉีด 1 ครั้ง</option>
                                                @elseif ($post->vaccine == 2)
                                                <option value="2" selected>ฉีด 2 ครั้ง</option>
                                                @elseif ($post->vaccine == 3)
                                                <option value="3" selected>ฉีด 3 ครั้ง</option>
                                                @endif
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
                                <textarea class="form-control" aria-label="With textarea" name='Detail_Dog'>{{$post->Detail_Dog}}</textarea>
                        </div>

                </div>
                <div class="col text-center">
                        <a href="/edit/dog/{{$post->id_the_dog}}" class="btn btn-light">เเก้ไขนอกจากนี้</a>
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>






        </form>
</div>

@endsection