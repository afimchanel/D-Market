@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container ">

  <div class="row">

    <div class="col-lg-3">

      <form action="/searchcategory" method="POST" role="search" autocomplete="off">
        @csrf
        <div class="list-group">
          <p class="list-group-item active">สายพันธุ์</p>
          <select class="custom-select" name='breed'>
            
            @if ($query->breed == 1 )
            <option value="1" selected>ปั๊ก (Pug) </option>
            @elseif($query->breed == NULL)
            <option selected value="">เลือกสายพันธุ์</option>
            @elseif($query->breed == 2)
            <option value="2" selected>ชิวาวา(Chihuahua)</option>
            @elseif($query->breed == 3)
            <option value="3" selected>ปอมเมอเรเนียน (Pomerania)</option>
            @elseif($query->breed == 4)
            <option value="4" selected>ชิสุ (Shih Tzu)</option>
            @elseif($query->breed == 5)
            <option value="5" selected>ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
            @elseif($query->breed == 6)
            <option value="6" selected>บีเกิล (Beagle)</option>
            @elseif($query->breed == 7)
            <option value="7" selected>บูลด็อก (Bulldog)</option>
            @elseif($query->breed == 8)
            <option value="8" selected>ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
            @elseif($query->breed == 9)
            <option value="9" selected>โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
            @elseif($query->breed == 10)
            <option value="10" selected>ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
            @elseif($query->breed == 11)
            <option value="11" selected>สายพันธุ์อื่นๆ</option>
            @endif
            <option value="">เลือกสายพันธุ์</option>
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
                     
                @if ($query->Age_Dog == 1)
                <option value="1" selected>น้อยกว่า10วัน</option>
                @elseif($query->Age_Dog == NULL)
                <option selected value="">เลือกอายุสุนัข</option>
                @elseif ($query->Age_Dog == 2)
                <option value="2" selected>11-20วัน</option>
                @elseif ($query->Age_Dog == 3)
                <option value="3" selected>21-30วัน</option>
                @elseif ($query->Age_Dog == 4)
                <option value="4" selected>31-40วัน</option>
                @elseif ($query->Age_Dog == 5)
                <option value="5" selected>41-50วัน</option>
                @elseif ($query->Age_Dog == 6)
                <option value="6" selected>มากกว่า50วัน</option>
                @endif
                <option value="">เลือกอายุสุนัข</option>
                <option value="1" >น้อยกว่า10วัน</option>
                <option value="2" >11-20วัน</option>
                <option value="3" >21-30วัน</option>
                <option value="4" >31-40วัน</option>
                <option value="5" >41-50วัน</option>
                <option value="6" >มากกว่า50วัน</option>

            </select>
          </div>


        </div>


        <div class="list-group">

          <div class="form-group">ลักษณะ
            <select class="custom-select" name='type_dog'>
              @if ($query->type_dog == 1)
              <option value="1" selected>ตัวเล็ก</option>
              @elseif($query->type_dog == NULL)
              <option value="" selected>เลือกลักษณะ</option>
              @elseif ($query->type_dog == 2)
              <option value="2" selected>ตัวใหญ่</option>
              @endif      

              <option value="">เลือกลักษณะ</option>
              <option value="1">ตัวเล็ก</option>
              <option value="2">ตัวใหญ่</option>
            </select>
          </div>
        </div>

        <div class="list-group">
          <div class="form-group">
            น้ำหนัก
            <select class="custom-select" name="weight_dog">
              @if ($query->weight_dog == 1)
              <option value="1" selected>น้อยกว่า10กิโล</option>
              @elseif ($query->weight_dog == NULL)
              <option value="" selected>เลือกน้ำหนัก</option>
              @elseif ($query->weight_dog == 2)
              <option value="2" selected>11กิโล-15กิโล</option>
              @elseif ($query->weight_dog == 3)
              <option value="3" selected>16กิโล-20กิโล</option>
              @elseif ($query->weight_dog == 4)
              <option value="4" selected>มากกว่า20กิโล</option>
              @endif
              <option value="">เลือกน้ำหนัก</option>
              <option value="1">น้อยกว่า10กิโล</option>
              <option value="2">11กิโล-15กิโล</option>
              <option value="3">16กิโล-20กิโล</option>
              <option value="4">มากกว่า20กิโล</option>
            </select>
          </div>
        </div>


        <div class="list-group">

          <div class="form-group">สีตา
          </div>
          <select class="custom-select" name="eye_color">
            
              @if ($query->eye_color == 1)
              <option value="1" selected>สีดำ</option>
              @elseif ($query->eye_color == 2)
              <option value="2" selected>สีน้ำตาล</option>
              @elseif ($query->eye_color == NULL)
              <option value="" selected>เลือกสีตา</option>
              @elseif ($query->eye_color == 3)
              <option value="3" selected>สีฟ้า</option>
              @elseif ($query->eye_color == 4)
              <option value="4" selected>สีน้ำตาลอ่อน</option>
              @elseif ($query->eye_color == 5)
              <option value="5" selected>สีน้ำตาลเข้ม</option>
              @elseif ($query->eye_color == 6)
              <option value="6" selected>สีน้ำตาล – สีฟ้า</option>
              @elseif ($query->eye_color == 7)
              <option value="7" selected>สีน้ำตาล- สีเขียว</option>
              @elseif ($query->eye_color == 8)
              <option value="8" selected>สีน้ำตาลเข้ม- สีน้ำตาลอ่อน</option>
              @endif
              <option value="" >เลือกสีตา</option>
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
          <input type="text"  name="price_min"  class="form-control" placeholder="Min Price" value="{{$query->price_min}}">
          <input type="text"  name="price_max" class="form-control" placeholder="Max Price" value="{{$query->price_max}}">
          </div>
        </div>

        <div class="form-group ">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color'>
            
              @if ($query->color == 1 )
              <option value="1" selected>สีขาว </option>
              @elseif($query->color == NULL)
              <option value="" selected>เลือกสี</option>
              @elseif($query->color == 2)
              <option value="2" selected>สีดำ</option>
              @elseif($query->color == 3)
              <option value="3" selected>นอกจากสีขาวและสีดำ</option>
              @endif

            <option value="" >เลือกสี</option>
            <option value="1">สีขาว</option>
            <option value="2">สีดำ</option>
            <option value="3">นอกจากสีขาวและสีดำ</option>
          </select>
        </div>



        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX'>
            
              @if ($query->sex == 1 )
              <option value="1" selected>ตัวผู้ </option>
              @elseif($query->sex == 2)
              <option value="2" selected>ตัวเมีย</option>
              @elseif($query->sex == NULL)
              <option selected value="">เลือกเพศสุนัข</option>
              @endif
              <option value="1">ตัวผู้</option>
              <option value="2">ตัวเมีย</option>

          </select>
          
        </div>
        
        <button class="btn btn-outline btn-filmm my-2 my-sm-0 fa fa-search search__ico" type="submit"></button>
      </form>
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9 ">
    @if(isset($details))
        <div class="row ">
          @foreach ($details as $item)
          @if ($item->Status > 0)

          @else 
          <div class="col-lg-4 col-md-6 mb-4 py-2">
            <div class="card h-100">
              <a href="/{{$item->id}}/{{$item->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagecover/{{$item->image}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">{{$item->Detail_Dog}}</a>

                </h4>
                <h5>ราคา : {{$item->price}}</h5>
                  {{-- @if ($item->order_id == NULL || $item->id_post !== NULL )
                    <span class="badge badge-success">สถานะ : ปกติ</span>
                  @elseif ($item->order_id !== NULL && $item->Status == 0)
                      <span class="badge badge-warning">สถานะ : รอจ่ายเงิน</span>
                  @elseif ($item->Status == 0)
                      <span class="badge badge-warning">สถานะ : รอยืนยันการจ่ายเงิน</span>
                  @elseif ($item->Status == 1)
                      <span class="badge badge-warning">สถานะ : รอส่งสุนัข</span>
                  @endif --}}
                
              </div>
              <div class="row justify-content-end">
                <a class="btn btn-success fa fa-cart-plus" href="/create/order/{{ Auth::user()->id}}/{{ $item->id }}/{{$item->Post_id}}"></a>

              </div>
            </div>
          </div>
          @endif
          @endforeach

        </div>
        <!-- /.row -->
      {{$details->links()}}
      @else
      ไม่พบ
        @if(session()->get('searchnot'))
        <div class="alert alert-success">
          {{ session()->get('searchnot') }}  
        </div><br />
        @endif

      @endif
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection