@extends('layouts.app')

@section('content')


<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>

<!-- Navigation -->


<!-- Page Content -->
<div class="container ">

  <div class="row">

    <div class="col-lg-3">

      <form action="/searchcategory" method="POST" role="search">
        @csrf
        <div class="list-group">
          <p class="list-group-item active">สายพันธุ์</p>
          <select class="custom-select" name='Breed'>
            <option selected>เลือกสายพันธู์</option>
            <option value="ปั๊ก">ปั๊ก (Pug) </option>
            <option value="ชิวาวา">ชิวาวา(Chihuahua)</option>
            <option value="ปอมเมอเรเนียน">ปอมเมอเรเนียน (Pomerania)</option>
            <option value="ชิสุ">ชิสุ (Shih Tzu)</option>
            <option value="ยอร์คเชียร์ เทอร์เรียร์">ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
            <option value="บีเกิล">บีเกิล (Beagle)</option>
            <option value="บูลด็อก">บูลด็อก (Bulldog)</option>
            <option value="ไซบีเรียน ฮัสกี้">ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
            <option value="โกลเด้น รีทรีฟเวอร์">โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
            <option value="ลาบราดอร์ รีทรีฟเวอร์">ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
            <option value="0">อื่นๆ</option>

          </select>
        </div>
        <div class="list-group">

          <div class="form-group">
            <label for="exampleFormControlSelect1">ช่วงอายุสุนัข</label>
            <select class="custom-select" name="Age_Dog">
              <option selected>เลือกช่วงอายุ</option>
              <option value="2">30-49</option>
              <option value="3">50-65</option>
              <option value="4">เกินกว่านั้น</option>
            </select>
          </div>


        </div>


        <div class="list-group">

          <div class="form-group">ลักษณะ
            <select class="custom-select" name='type_dog'>
              <option selected>เลือกขนาด</option>
              <option value="1">ตัวเล็ก</option>
              <option value="2">ตัวใหญ่</option>

            </select>
          </div>
        </div>

        <div class="list-group">
          <div class="form-group">
            น้ำหนัก
            <select class="custom-select" name="weight_dog">
              <option selected>เลือกน้ำหนัก</option>
              <option value="1">1-5 กิโล</option>
              <option value="2">5-10 กิโล</option>
              <option value="3">มากว่านั้น</option>
            </select>
          </div>
        </div>


        <div class="list-group">

          <div class="form-group">สีตา
          </div>
          <select class="custom-select" name="eye_color">
            <option selected>เลือกสีตา</option>
            <option value="1">ดำ</option>
            <option value="2">น้ำตาล</option>
            <option value="3">ฟ้า</option>
            <option value="4">นอกเหนือจากนี้</option>
          </select>
        </div>

        <div class="list-group">

            <div class="list-group">
                <div class="rangeslider">
                  <label for="price-min">Price:</label>
                  <input type="range" name="price-min"  min="1" max="50000" value="1" class="custom-range" id="price">
                  <p>Value: <span id="price"></span></p>
                </div>
              </div>
        </div>

        <div class="form-group ">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color'>
            <option selected>เลือกสี</option>
            <option value="1">ขาว</option>
            <option value="2">ดำ</option>
            <option value="3">อื่น</option>
          </select>
        </div>



        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option selected>เลือกเพศสุนัข</option>
            <option value="M">ตัวผู้</option>
            <option value="G">ตัวเมีย</option>

          </select>
          <div class="invalid-feedback">กรุณาเลือกเพศ</div>
        </div>

        <button class="btn btn-outline btn-filmm my-2 my-sm-0" type="submit">ค้นหา</button>
      </form>


    </div>
    <!-- /.col-lg-3 -->


    <div class="col-lg-9 ">
   


      <div class="row ">

        @foreach ($post as $item)

        <div class="col-lg-4 col-md-6 mb-4 py-2">
          <div class="card h-100">
            <a href="/{{$item->id}}/{{$item->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagecover/{{$item->image}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="/{{$item->id_the_dog}}/{{$item->Post_id}}/view/post">{{$item->title_post}} {{$item->breed}}</a>

              </h4>
              <h5>ราคา : {{$item->price}}</h5>
              
              @if ($item->order_id == NULL)
                  <span class="badge badge-success">สถานะ : ปกติ</span>
              @elseif ($item->order_id !== NULL && $item->Status == 0)
                  <span class="badge badge-warning">สถานะ : รอจ่ายเงิน</span>
              @elseif ($item->Status == 0)
                  <span class="badge badge-warning">สถานะ : รอยืนยันการจ่ายเงิน</span>
              @elseif ($item->Status == 1)
                  <span class="badge badge-warning">สถานะ : รอส่งสุนัข</span>
              @elseif ($item->Status == 2)
                  <span class="badge badge-danger">สถานะ : ขายแล้ว</span>
              @endif
              
            </div>
            <div class="row justify-content-end">
              <a class="btn btn-primary" href="/create/order/{{ Auth::user()->id}}/{{ $item->id_the_dog }}/{{$item->Post_id}}">เพิ่มไปยังตะกร้า</a>

            </div>
          </div>
        </div>
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