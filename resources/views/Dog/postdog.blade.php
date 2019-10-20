@extends('layouts.app')


@section('content')


<div class="container ">

  <h3 class="text-center">กรอกข้อมูลใบเพ็ด</h3>
  <h6 class="text-center"> Registration Certificate  </h6>
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <strong>อุ๊ปป!</strong> คุณยังไม่ได้กรอกสิ่งเหล่านี้<br><br>
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  <div class="form-group ">
    
    <form method="post" action="{{ route('dog.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
      @csrf
      <div class="form-row">
        <div class="col-md-4 mb-3">

          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สายพันธุ์สุนัข</label>
          <select class="custom-select @error('Breed') is-invalid @enderror" name='Breed' required>
            <option >เลือกสายพันธุ์</option>
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
          @error('Breed')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณาใส่สายพันธุ์สุนัข</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">ชื่อสุนัข</label>
          <input type="text" class="form-control @error('namedog') is-invalid @enderror" id="namedog" placeholder="ชื่อสุนัข" name="namedog" required autocomplete="namedog" autofocus>
          @error('namedog')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อสุนัข</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="validationTooltip02">IDสุนัข</label>
          <input type="text" class="form-control"   @error('IDthedog') is-invalid @enderror placeholder="IDสุนัข ที่อยู่ในใบ" name="IDthedog" required>
          @error('IDthedog')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกไอดีสุนัข</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup id">เลขทะเบียนพันธุ์</label>
          <input type="text" class="form-control" @error('Registrationspecies') is-invalid @enderror placeholder="เลขทะเบียนพันธุ์" name="Registrationspecies" required>
          @error('Registrationspecies')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกเลขทะเบียนพันธุ์</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupNum">เลขไมโครชิพ</label>
          <input type="text" class="form-control" @error('Nomicrochip') is-invalid @enderror  placeholder="เลขไมโครชิพ" name="Nomicrochip" required>
          @error('Nomicrochip')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกเลขไมโครชิพ</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">สี</label>
          <select class="custom-select" name='color' required>
            <option>เลือกสี</option>
            <option value="1">สีขาว</option>
            <option value="2">สีดำ</option>
            <option value="3">นอกจากสีขาวและสีดำ</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
          <select class="custom-select" name='SEX' required>
            <option >เลือกเพศสุนัข</option>
            <option value="1">ตัวผู้</option>
            <option value="2">ตัวเมีย</option>
          </select>
        
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupFather">พ่อพันธุ์</label>
          <input type="text" class="form-control"  @error('Father') is-invalid @enderror placeholder="กรอกชื่อพ่อพันธุ์ " name="Father" required>
          @error('Father')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อพ่อพันธุ์</strong>
          </span>
          @enderror
        </div>
        <div class="col-md-4 mb-3">
          <label for="formGroupMather">idพ่อพันธุ์  </label>
          <input type="text" class="form-control"  placeholder=" ถ้าไม่มีข้อมูลไม่ต้องกรอก" name="id_father" >
        </div>


        <div class="col-md-4 mb-3">
          <label for="formGroupMather">แม่พันธุ์</label>
          <input type="text" class="form-control"  @error('Momher') is-invalid @enderror placeholder="กรอกชื่อแม่พันธุ์" name="Momher" required>
          @error('Momher')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อแม่พันธุ์</strong>
          </span>
          @enderror
        </div>
          <div class="col-md-4 mb-3">
            <label for="formGroupMather">idแม่พันธุ์ </label>
            <input type="text" class="form-control"  placeholder=" ถ้าไม่มีข้อมูลไม่ต้องกรอก" name="id_momher" >
          </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">วันเกิดสุนัข</label>
          <input type="date" class="form-control" @error('birthday') is-invalid @enderror placeholder="กรอกวันเกิดสุนัข" name="birthday" required>
          @error('birthday')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกวันเกิดสุนัข</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroupMather">ชื่อผู้เพาะพันธุ์ </label>
          <input type="text" class="form-control" @error('Breedername') is-invalid @enderror placeholder="กรอกชื่อผู้เพาะพันธุ์" name="Breedername" required>
          @error('Breedername')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อผู้เพาะพันธุ์</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Owder">เจ้าของ</label>
          <input type="text" class="form-control" @error('Owner') is-invalid @enderror  name="Owner" placeholder="กรอกชื่อเจ้าของ" required>
          @error('Owner')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกชื่อเจ้าของ</strong>
          </span>
          @enderror
        </div>

        <div class="col-md-4 mb-3">
          <label for="formGroup Regis">วันออกทะเบียน </label>
          <input type="date" class="form-control" @error('Registrationdate') is-invalid @enderror  placeholder="วันออกทะเบียน" name="Registrationdate" required>
          @error('Registrationdate')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณากรอกวันออกทะเบียน</strong>
          </span>
          @enderror
        </div>

      </div>

      <br><br>

      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="formGroup File">อัพโหลดใบ CERTIFIED PEDIGREE</label>
          <div class="custom-file">
            <input type="file" name="imageCP" id="imageCP" class="custom-file-input" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="imageCP">Choose file</label>
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
      </div>

      <div class="col-md-4 mb-3">
        <label for="formGroup File">อัพโหลดรูปปกสุนัข </label>
        <div class="custom-file">
          <input type="file" name="image"  @error('image') is-invalid @enderror class="custom-file-input" accept=".png, .jpg, .jpeg" required>
          <label class="custom-file-label">Choose file</label>
          @error('image')
          <span class="invalid-feedback" role="alert">
            <strong>กรุณาอัพโหลดรูปปกสุนัขและขนาดไฟล์ไม่เกิน2MB</strong>
          </span>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">ตกลง</button>


    </form>

  </div>

</div>
</div>


@endsection