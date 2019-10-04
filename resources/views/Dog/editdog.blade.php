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
@if(session()->get('dogimages'))
<div class="alert alert-success">
  {{ session()->get('dogimages') }}  
</div><br />
@endif
<?php 
use App\dogimages;
$dogimages = dogimages::where('dog_id',$Dog->idthedog)->get();
?>
<div class="container ">

  <h3 class="text-center">แก้ไขข้อมูลสุนัข</h3>

  <div class="form-group ">
    <form method="post" action="/update/dog/{{$Dog->id}}" enctype="multipart/form-data" class="needs-validation" novalidate>
      @csrf
      <div class="form-row">


        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สายพันธุ์สุนัข</label>
          <select class="custom-select" name='Breed' required>

          @if ($Dog->breed == 1 )
          <option value="1" selected>ปั๊ก (Pug) </option>
          @elseif($Dog->breed == 2)
          <option value="2" selected>ชิวาวา(Chihuahua)</option>
          @elseif($Dog->breed == 3)
          <option value="3" selected>ปอมเมอเรเนียน (Pomerania)</option>
          @elseif($Dog->breed == 4)
          <option value="4" selected>ชิสุ (Shih Tzu)</option>
          @elseif($Dog->breed == 5)
          <option value="5" selected>ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
          @elseif($Dog->breed == 6)
          <option value="6" selected>บีเกิล (Beagle)</option>
          @elseif($Dog->breed == 7)
          <option value="7" selected>บูลด็อก (Bulldog)</option>
          @elseif($Dog->breed == 8)
          <option value="8" selected>ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
          @elseif($Dog->breed == 9)
          <option value="9" selected>โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
          @elseif($Dog->breed == 10)
          <option value="10" selected>ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
          @elseif($Dog->breed == 11)
          <option value="11" selected>สายพันธุ์อื่นๆ</option>
          @endif

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


        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">ชื่อสุนัข</label>
          <input type="text" class="form-control @error('namedog') is-invalid @enderror"   name="namedog" required autocomplete="namedog" autofocus value='{{$Dog->namedog}}'>
          @error('namedog')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อสุนัข</strong>
          </span>
          @enderror
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">IDสุนัข</label>
          <input type="text" class="form-control"  name="IDthedog" value='{{$Dog->idthedog}}' required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroup id">เลขทะเบียนพันธุ์</label>
          <input type="text" class="form-control"  name="Registrationspecies" value='{{$Dog->registrationspecies}}' required>

        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupNum">เลขไมโครชิพ</label>
          <input type="text" class="form-control"  name="Nomicrochip" value='{{$Dog->nomicrochip}}' required>

        </div>
        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color' required>
          
              @if ($Dog->color == 1 )
              <option value="1" selected>สีขาว </option>
              @elseif($Dog->color == 2)
              <option value="2" selected>สีดำ</option>
              @elseif($Dog->color == 3)
              <option value="3" selected>นอกจากสีขาวและสีดำ</option>
              @endif
            <
            <option value="1">สีขาว</option>
            <option value="2">สีดำ</option>
            <option value="3">นอกจากสีขาวและสีดำ</option>
          </select>
        </div>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            @if ($Dog->sex == 1 )
            <option value="1" selected>ตัวผู้ </option>
            @elseif($Dog->sex == 2)
            <option value="2" selected>ตัวเมีย</option>
            @endif
            <option value="1">ตัวผู้</option>
            <option value="2">ตัวเมีย</option>

          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupFather">พ่อพันธุ์</label>
          <input type="text" class="form-control" name="Father" value='{{$Dog->father}}' required>
        </div>
        @if ($Dog->id_father)
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">idพ่อพันธุ์  </label>
          <input type="text" class="form-control"  placeholder=" ถ้าไม่มีข้อมูลไม่ต้องกรอก" name="id_father"  value='{{$Dog->id_father}}'>
        </div>
        @endif

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">แม่พันธุ์</label>
          <input type="text" class="form-control" name="Momher" value='{{$Dog->momher}}' required>
        </div>
        @if ($Dog->id_momher)
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">idแม่พันธุ์  </label>
          <input type="text" class="form-control"  placeholder=" ถ้าไม่มีข้อมูลไม่ต้องกรอก" name="id_momher"  value='{{$Dog->id_momher}}'>
        </div>
        @endif
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">วันเกิดสุนัข</label>
          <input type="date" class="form-control" name="birthday" value='{{$Dog->birthday}}' required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">ชื่อผู้เพาะพันธุ์</label>
          <input type="text" class="form-control" id="formGroupMather" name="Breedername" value='{{$Dog->breedername}}' required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Owder">เจ้าของ</label>
          <input type="text" class="form-control"  name="Owner" value='{{$Dog->owner}}' required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Regis">วันออกทะเบียน </label>
          <input type="date" class="form-control" name="Registrationdate" value='{{$Dog->registrationdate}}' required>

        </div>

        <div class="form-group ">
          <label for="formGroup File">อัพโหลดรูป</label>
          <img class="card-img-top" src="/storage/public/imagedog/imageRC/{{$Dog->imageRC}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="imageRC" accept=".png, .jpg, .jpeg"  value="{{$Dog->imageRC}}">
            <label class="custom-file-label" for="imageRC">Choose file</label>
          </div>
        </div>


      </div>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดใบCP</label>
          <img class="card-img-top" src="/storage/public/imagedog/imageCP/{{$Dog->imageCP}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" name="imageCP" id="imageCP" class="custom-file-input" accept=".png, .jpg, .jpeg" value="{{$Dog->imageCP}}">
            <label class="custom-file-label" for="cover_image1">Choose file</label>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="formGroup File">อัพโหลดรูปปกสุนัข</label>
          <img class="card-img-top" src="/storage/public/imagecover/{{$Dog->image}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" name="cover_image" class="custom-file-input" multiple accept=".png, .jpg, .jpeg" value="{{$Dog->image}}">
            <label class="custom-file-label" for="cover_image">Choose file</label>
          </div>
        </div>

      </div>
      <div class="col-md-4 mb-3">
        <label for="formGroup File">อัพโหลดรูปสุนัข</label>
        <div class="custom-file">
          <input type="file" name="filename[]"  @error('filename[]') is-invalid @enderror class="custom-file-input" multiple accept=".png, .jpg, .jpeg">
          <label class="custom-file-label" for="cover_image">Choose file</label>
          @error('filename[]')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณาอัพโหลดรูปสุนัขและขนาดไฟล์ไม่เกิน2MB</strong>
          </span>
          @enderror

        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="formGroup File">อัพโหลดวิดิโอสุนัข</label>
        <div class="custom-file">
          <input type="file" name="video[]" class="custom-file-input" multiple accept=".mp4">
          <label class="custom-file-label">Choose file</label>
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



@foreach ($dogimages as $item)
<div class="row">

  <div class="col-md-3 col-sm-6 mb-4">
    <a href='/delete/dogimages/{{$item->id}}'>
      @csrf
      <span aria-hidden="true">&times;</span>
    </a>
    <img class="img-fluid" src="/storage/public/imagedog/{{$item->image}}" alt="">
  </div>  
</div>
@endforeach
  

</div>
</div>



@endsection