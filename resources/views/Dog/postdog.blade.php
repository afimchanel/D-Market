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

  <h3 class="text-center">กรอกข้อมูลใบเพ็ด</h3>
  <h6 class="text-center">REGISTRATION CERTIFICATE</h6>

  <div class="form-group ">
    <form method="post" action="{{ route('dog.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
      @csrf
      <div class="form-row">
        <div class="col-md-4 mb-3">

          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สายพันธุ์สุนัข</label>
          <select class="custom-select" name='Breed' required>
            <option value="">เลือกสายพันธู์</option>
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

        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">ชื่อสุนัข</label>
          <input type="text" class="form-control @error('namedog') is-invalid @enderror" id="namedog" placeholder="ชื่อสุนัข" name="namedog" required autocomplete="namedog" autofocus>
          @error('namedog')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">IDสุนัข</label>
          <input type="text" class="form-control" id="validationTooltip02" placeholder="IDสุนัข ที่อยู่ในใบ" name="IDthedog" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup id">เลขทะเบียนพันธุ์</label>
          <input type="text" class="form-control" id="formGroup id" placeholder="เลขทะเบียนพันธุ์" name="Registrationspecies" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupNum">เลขไมโครชิพ</label>
          <input type="text" class="form-control" id="formGroupNum" placeholder="เลขไมโครชิพ" name="Nomicrochip" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color' required>
            <option value="">เลือกสี</option>
            <option value="1">ขาว</option>
            <option value="2">ดำ</option>
            <option value="3">อื่น</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option value="">เลือกเพศสุนัข</option>
            <option value="M">ตัวผู้</option>
            <option value="F">ตัวเมีย</option>
          </select>
          <div class="invalid-feedback">กรุณาเลือกเพศ</div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupFather">พ่อพันธุ์</label>
          <input type="text" class="form-control" id="formGroupFather" placeholder="กรอกชื่อพ่อพันธุ์ " name="Father" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">แม่พันธุ์</label>
          <input type="text" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="Momher" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">วันเกิดสุนัช</label>
          <input type="date" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="birthday" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">ชื่อผู้เพาะพันธุ์ </label>
          <input type="text" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="Breedername" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Owder">เจ้าของ</label>
          <input type="text" class="form-control" id="formGroup Owder" name="Owner" placeholder="วันออกทะเบียน" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Regis">วันออกทะเบียน </label>
          <input type="date" class="form-control" id="formGroup Regis" placeholder="วันออกทะเบียน" name="Registrationdate" required>
        </div>

        <div class="col-md-4 mb-3 ">
          <label for="formGroup File">อัพโหลดรูป</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="imageRC" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="cover_image2">อัปโหลดรูปREGISTRATION CERTIFICATE</label>
          </div>
        </div>
      </div>

      <br><br>
      <h6 class="text-center">CERTIFIED PEDIGREE</h6>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดใบCP</label>
          <div class="custom-file">
            <input type="file" name="imageCP" id="imageCP" class="custom-file-input" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="imageCP">อัปโหลดรูปCERTIFIED PEDIGREE</label>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดรูปสุนัข</label>
          <div class="custom-file">
            <input type="file" name="filename[]" class="custom-file-input" multiple accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="cover_image">Choose file</label>
          </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="formGroup File">อัพโหลดวิดิโอสุนัข</label>
            <div class="custom-file">
              <input type="file" name="video[]" class="custom-file-input" multiple accept=".mp4">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดรูปปกสุนัข</label>
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input"  accept=".png, .jpg, .jpeg">
            <label class="custom-file-label">Choose file</label>
          </div>
        </div>
      </div>

      
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="check">
          <label class="form-check-label" for="defaultCheck1">
            เช็คตรงนี้ถ้าเป็นพ่อแม่สุนัข
          </label>
        </div>
        <button  type="submit" class="btn btn-primary">ตกลง</button>
      

    </form>

  </div>

</div>
</div>


@endsection