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

<div class="container ">

  <h3 class="text-center">แก้ไขข้อมูลสุนัข</h3>

  <div class="form-group ">
    <form method="post" action="/update/dog/{{$Dog->ID_dog}}" enctype="multipart/form-data" class="needs-validation" novalidate>
      @csrf
      <div class="form-row">


        <div class="col-md-4 mb-3">
          <label for="formGroup Gen">สายพันธุ์สุนัข</label>

          <select class="custom-select" name='Breed' required>
            <option value="{{$Dog->Breed}}">{{$Dog->Breed}}</option>
            <option value="">เลือกสายพันธู์</option>
            <option value="ปั๊ก">ปั๊ก (Pug) </option>
            <option value="ชิวาวา">ชิวาวา(Chihuahua)</option>
            <option value="ปอมเมอเรเนียน">ปอมเมอเรเนียน (Pomerania)
            </option>
            <option value="ชิสุ">ชิสุ (Shih Tzu)</option>
            <option value="ยอร์คเชียร์ เทอร์เรียร์">ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)</option>
            <option value="บีเกิล">บีเกิล (Beagle)</option>
            <option value="บูลด็อก">บูลด็อก (Bulldog)</option>
            <option value="ไซบีเรียน ฮัสกี้">ไซบีเรียน ฮัสกี้ (Siberian Husky)</option>
            <option value="โกลเด้น รีทรีฟเวอร์">โกลเด้น รีทรีฟเวอร์ (Golden Retriever)</option>
            <option value="ลาบราดอร์ รีทรีฟเวอร์">ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)</option>
            <option value="0">อื่นๆ</option>
          </select>

          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        
        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">ชื่อสุนัข</label>
          <input type="text" class="form-control" id="validationTooltip02" name="namedog" value='{{$Dog->namedog}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">IDสุนัข</label>
          <input type="text" class="form-control" id="validationTooltip02" name="IDthedog" value='{{$Dog->IDthedog}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroup id">เลขทะเบียนพันธุ์</label>
          <input type="text" class="form-control" id="formGroup id" name="Registrationspecies" value='{{$Dog->Registrationspecies}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupNum">เลขไมโครชิพ</label>
          <input type="text" class="form-control" id="formGroupNum" name="Nomicrochip" value='{{$Dog->Nomicrochip}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupColor">สี</label>
          <input type="text" class="form-control" id="formGroupColor" name="color" value='{{$Dog->color}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option value="{{$Dog->SEX}}">{{$Dog->SEX}}</option>
            <option value="1">ตัวผู้</option>
            <option value="2">ตัวเมีย</option>

          </select>
          <div class="invalid-feedback">กรุณาเลือกเพศ</div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupFather">พ่อพันธุ์</label>
          <input type="text" class="form-control" id="formGroupFather" name="Father" value='{{$Dog->Father}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">แม่พันธุ์</label>
          <input type="text" class="form-control" id="formGroupMather" name="Momher" value='{{$Dog->Momher}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">วันเกิดสุนัช</label>
          <input type="date" class="form-control" id="formGroupMather" name="birthday" value='{{$Dog->birthday}}' required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">ชื่อผู้เพาะพันธุ์ </label>
          <input type="text" class="form-control" id="formGroupMather" name="Breedername" value='{{$Dog->Breedername}}' required>

        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroup Owder">เจ้าของ</label>
          <input type="text" class="form-control" id="formGroup Owder" name="Owner" value='{{$Dog->Owner}}' required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Regis">วันออกทะเบียน </label>
          <input type="date" class="form-control" id="formGroup Regis" name="Registrationdate" value='{{$Dog->Registrationdate}}' required>

        </div>

        <div class="form-group ">
          <label for="formGroup File">อัพโหลดรูป</label>
          <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$Dog->imageRC}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="imageRC" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="imageRC">อัปโหลดรูปREGISTRATION CERTIFICATE</label>
          </div>
        </div>


      </div>
      <h6 class="text-center">CERTIFIED PEDIGREE</h6>
      <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดใบCP</label>
          <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$Dog->imageCP}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" name="imageCP" id="imageCP" class="custom-file-input" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="cover_image1">อัปโหลดรูปCERTIFIED PEDIGREE</label>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="formGroup File">อัพโหลดรูปสุนัข</label>
          <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}" style="width:250px; height:250px;">
          <div class="custom-file">
            <input type="file" name="cover_image" class="custom-file-input" multiple accept=".png, .jpg, .jpeg" value="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}">
            <label class="custom-file-label" for="cover_image">Choose file</label>
          </div>
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






</div>
</div>



@endsection