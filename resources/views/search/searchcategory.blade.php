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
            <label for="exampleFormControlSelect1">ช่วงอายุสุนัข(หน่วยเป็นวัน)</label>
            <select class="custom-select" name="Age_Dog">
              <option selected>         
                @if ($query->Age_Dog !== 2 && $query->Age_Dog !== 3 && $query->Age_Dog !== 4)
                  {{$query->Age_Dog}}
                @elseif ($query->Age_Dog == 2)
                  30-49 วัน
                @elseif ($query->Age_Dog == 3)
                  50-65 วัน
                @elseif ($query->Age_Dog == 4)
                  เกินกว่านั้น

                @endif
              </option>
              
              <option value="2">30-49</option>
              <option value="3">50-65</option>
              <option value="4">เกินกว่านั้น</option>
            </select>
          </div>


        </div>


        <div class="list-group">

          <div class="form-group">ลักษณะ
            <select class="custom-select" name='type_dog'>
              <option selected>{{$query->type_dog}}
                @if ($query->type_dog == 1)
                  ตัวเล็ก
                @elseif ($query->type_dog == 2)
                  ตัวใหญ่
                @endif
                </option>
              <option value="1">ตัวเล็ก</option>
              <option value="2">ตัวใหญ่</option>

            </select>
          </div>
        </div>

        <div class="list-group">
          <div class="form-group">
            น้ำหนัก
            <select class="custom-select" name="weight_dog">
              <option selected>{{$query->weight_dog}}
                @if ($query->weight_dog == 1)
                  1-5 กิโล
                @elseif ($query->weight_dog == 2)
                  5-10 กิโล
                @elseif ($query->weight_dog == 3)
                  มากว่านั้น
                @endif
              </option>
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
            <option selected>{{$query->eye_color}}
              @if ($query->eye_color == 1)
                สีดำ
              @elseif ($query->eye_color == 2)
              สีน้ำตาล
              @elseif ($query->eye_color == 3)
              สีฟ้า
              @elseif ($query->eye_color == 4)
              นอกเหนือจากนี้
              @endif
            </option>
            <option value="1">ดำ</option>
            <option value="2">น้ำตาล</option>
            <option value="3">ฟ้า</option>
            <option value="4">นอกเหนือจากนี้</option>
          </select>
        </div>

        <div class="list-group">
          <label for="customRange2">ราคา</label>
          <input type="range" class="custom-range" min="0" max="5" id="customRange2">
        </div>

        <div class="form-group ">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color'>
            <option selected>{{$query->color}}
              @if ($query->color == 1)
                สีขาว
              @elseif ($query->color == 2)
                สีดำ
              @elseif ($query->color == 3)
                อื่นๆ
              @endif
            </option>
            <option value="1">ขาว</option> 
            <option value="2">ดำ</option>
            <option value="3">อื่น</option>
          </select>
        </div>



        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option selected>{{$query->SEX}}
              @if ($query->SEX == "M")
                ตัวผู้
              @elseif ($query->SEX == "G")
                ตัวเมีย
              @endif
            </option>
            <option value="M">ตัวผู้</option>
            <option value="G">ตัวเมีย</option>

          </select>
          
        </div>

        <button class="btn btn-outline btn-filmm my-2 my-sm-0" type="submit">ค้นหา</button>
      </form>


    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9 ">
      
      

     
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
                  @if ($item->order_id == NULL || $item->id_post !== NULL )
                    <span class="badge badge-success">สถานะ : ปกติ</span>
                  @elseif ($item->order_id !== NULL && $item->Status == 0)
                      <span class="badge badge-warning">สถานะ : รอจ่ายเงิน</span>
                  @elseif ($item->Status == 0)
                      <span class="badge badge-warning">สถานะ : รอยืนยันการจ่ายเงิน</span>
                  @elseif ($item->Status == 1)
                      <span class="badge badge-warning">สถานะ : รอส่งสุนัข</span>
                  @endif
                
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
      @else
      ทำรูปไม่พบสุนัข
                  @if(session()->get('Message'))
                    <div class="alert alert-warning">
                      {{ session()->get('Message') }}  
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