@extends('layouts.app')

@section('content')
<?php 

use App\orderdetail;
use App\order;


?>
<!-- Page Content -->
<div class="container ">

  <div class="row">

    <div class="col-lg-3">

      <form action="/searchcategory" method="POST" role="search" autocomplete="off">
        @csrf
        <div class="list-group">
          <p class="list-group-item active">สายพันธุ์</p>
          <select class="custom-select" name='breed'>
            <option selected value="">เลือกสายพันธุ์</option>
            <option value="1">ปั๊ก (Pug) </option>
            <option value="2">ชิวาวา(Chihuahua)</option>
            <option value="3">ปอมเมอเรเนียน (Pomerania)</option>
            <option value="4">ชิสุ (Shih Tzu)</option>
            <option value="5">ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
            <option value="6">บีเกิล (Beagle)</option>
            <option value="7">บูลด็อก (Bulldog)</option>
            <option value="8">ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
            <option value="9">โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
            <option value="10">ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
            <option value="11">สายพันธุ์อื่นๆ</option>

          </select>
        </div>
        <div class="list-group">

          <div class="form-group">
            <label for="exampleFormControlSelect1">ช่วงอายุสุนัข</label>
            <select class="custom-select" name="Age_Dog">
              <option selected value="">เลือกอายุสุนัข</option>
              <option value="1">น้อยกว่า10วัน</option>
              <option value="2">11-20วัน</option>
              <option value="3">21-30วัน</option>
              <option value="4">31-40วัน</option>
              <option value="5">41-50วัน</option>
              <option value="6">มากกว่า50วัน</option>
            </select>
          </div>
        </div>


        <div class="list-group">
          <div class="form-group">
            <select class="custom-select" name='type_dog'>
              <option selected value="">เลือกลักษณะ</option>
              <option value="1">สุนัขพันธุ์เล็ก</option>
              <option value="2">สุนัขพันธุ์กลาง</option>
              <option value="3">สุนัขพันธุ์ใหญ่</option>

            </select>
          </div>
        </div>

        <div class="list-group">
          <div class="form-group">
            น้ำหนัก
            <select class="custom-select" name="weight_dog">
              <option selected value="">เลือกน้ำหนัก</option>
              <option value="1">น้อยกว่า10กิโล</option>
              <option value="2">11กิโล-15กิโล</option>
              <option value="3">16กิโล-20กิโล</option>
              <option value="4">มากกว่า20กิโล</option>
            </select>
          </div>
        </div>


        <div class="list-group">
          <div class="form-group">สีตา</div>
          <select class="custom-select" name="eye_color">
            <option selected value="">เลือกสีตา</option>
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

        <div class="form-group">ราคา</div>

        <div class="my-1 mr-2">
          <div class="input-group">
              <input type="text"  name="price_min"  class="form-control" placeholder="Min Price" value="">
              <input type="text"  name="price_max" class="form-control" placeholder="Max Price" value="">
          </div>
        </div>

        <div class="form-group ">
          <label class="my-1 mr-2" >สี</label>
          <select class="custom-select" name='color'>
            <option selected value="">เลือกสี</option>
            <option value="1">สีขาว</option>
            <option value="2">สีดำ</option>
            <option value="3">นอกจากสีขาวและสีดำ</option>
          </select>
        </div>



        <div class="form-group">
          <label class="my-1 mr-2">เพศสุนัข</label>
          <select class="custom-select" name='SEX'>
            <option selected value="">เลือกเพศสุนัข</option>
            <option value="1">ตัวผู้</option>
            <option value="2">ตัวเมีย</option>
          </select>
        </div>

        <button class="btn btn-outline btn-filmm my-2 my-sm-0 fa fa-search search__icon" type="submit"></button>
      </form>
    </div>
    <!-- /.col-lg-3 -->


    <div class="col-lg-9 ">
      <div class="row ">
      
        @foreach ($post as $item)

          <div class="col-lg-4 col-md-6 mb-4 py-2">
            <div class="card h-100">
              <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">
                @if ($item->image == NULL )
                <img class="card-img-top" src="/storage/public/imagecover/nopicture.jpg">
                @endif
                <img class="card-img-top" src="/storage/public/imagecover/{{$item->image}}" >
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">{{$item->Detail_Dog}}</a>
                </h4>
                <h5>ราคา : {{$item->price}}</h5> 
              </div>
                <a class="btn btn-success fa fa-cart-plus" href="/create/order/{{$item->user_id}}/{{ $item->id }}/{{$item->Post_id}}"></a>
            </div>
          </div>
        

          {{-- @endif --}}

        
        @endforeach
      
      </div>
      <!-- /.row -->
      {{$post->links()}}
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection