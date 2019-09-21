@extends('layouts.app')

@section('content')



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
            <option selected>{{$query->Breed}}</option>
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
              <option selected>{{$query->Age_Dog}}</option>
              <option value="1">1-2</option>
              <option value="2">3-4</option>
              <option value="3">5-6</option>
              <option value="4">อื่นๆ</option>
            </select>
          </div>


        </div>


        <div class="list-group">

          <div class="form-group">ลักษณะ
            <select class="custom-select" name='type_dog'>
              <option selected>{{$query->type_dog}}</option>
              <option value="1">ตัวเล็ก</option>
              <option value="2">ตัวใหญ่</option>

            </select>
          </div>
        </div>

        <div class="list-group">
          <div class="form-group">
            น้ำหนัก
            <select class="custom-select" name="weight_dog">
              <option selected>{{$query->weight_dog}}</option>
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
            <option selected>{{$query->eye_color}}</option>
            <option value="1">ดำ</option>
            <option value="2">น้ำตาล</option>
            <option value="3">ฟ้า</option>
            <option value="4">อื่นๆ</option>
          </select>
        </div>

        <div class="list-group">
          <label for="customRange2">ราคา</label>
          <input type="range" class="custom-range" min="0" max="5" id="customRange2">
        </div>

        <div class="form-group ">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color'>
            <option selected>{{$query->color}}</option>
            <option value="1">ขาว</option>
            <option value="2">ดำ</option>
            <option value="3">อื่น</option>
          </select>
        </div>



        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option selected>{{$query->SEX}}</option>
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
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category 1
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                      <span class="text-uppercase ">Category 1</span>
                      <ul class="nav flex-column">

                      </ul>
                    </div>


                  </div>
                </div>
                <!--  /.container  -->
              </div>
            </li>
          </ul>
        </div>
      </nav>
      

      @if(isset($details))

      <div class="row ">

        @foreach ($details as $item)

        <div class="col-lg-4 col-md-6 mb-4 py-2">
          <div class="card h-100">
            <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">{{$item->title_post}} {{$item->Breed}}</a>

              </h4>
              <h5>ราคา : {{$item->price}}</h5>
              <p class="card-text">{{$item->Detail_Dog}}</p>
            </div>
            <div class="row justify-content-end">
              <a class="btn btn-primary" href="/create/order/{{ Auth::user()->id}}/{{ $item->ID_dog }}/{{$item->Post_id}}">Add to cart</a>

            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- /.row -->
      {{$details->links()}}
      @endif

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection