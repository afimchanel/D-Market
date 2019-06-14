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
                <form class="needs-validation" novalidate>
                        <div class="form-row">
                          <div class="col-md-4 mb-3">
                            <label for="formGroup Gen">สายพันธุ์สุนัข</label>

                            <input type="text" class="form-control" id="formGroup Gen" placeholder="สายพันธุ์สุนัข(ภาษาไทย)" name="Breed" required>
                            <div class="valid-tooltip">
                              Looks good!
                            </div>
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
                                <label for="formGroupColor">สี</label>
                                <input type="text" class="form-control" id="formGroupColor" placeholder="สี" name="color" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">เพศสุนัข</label>
                                    <select class="custom-select" required>
                                      <option value="">เลือกเพศสุนัข</option>
                                      <option value="ตัวผู้">ตัวผู้</option>
                                      <option value="ตัวเมีย">ตัวเมีย</option>
                                     
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกเพศ</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formGroupFather">พ่อพันธุ์</label>
                                <input type="text" class="form-control" id="formGroupFather" placeholder="กรอกชื่อพ่อพันธุ์ " name="Father" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="formGroupMather">แม่พันธุ์</label>
                                <input type="text" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="Momher" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="formGroupMather">วันเกิดสุนัช</label>
                                <input type="date" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="birthday" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                            <label for="formGroupMather">ชื่อผู้เพาะพันธุ์ </label>
                            <input type="text" class="form-control" id="formGroupMather" placeholder="กรอกชื่อแม่พันธุ์" name="Breedername" required>
                            
                            </div>   
                            <div class="col-md-4 mb-3">
                                <label for="formGroup Owder">เจ้าของ</label>
                                <input type="text" class="form-control" id="formGroup Owder" name="Owner" placeholder="วันออกทะเบียน" required >
                            </div>
                            
                            <div class="col-md-4 mb-3">
                            <label for="formGroup Regis">วันออกทะเบียน </label>
                            <input type="date" class="form-control" id="formGroup Regis" placeholder="วันออกทะเบียน" name="Registrationdate"  required>
                                                    
                            </div>             
                            <div class="form-group ">
                                <label  for="formGroup File">อัพโหลดรูป</label>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cover_image2" accept=".png, .jpg, .jpeg"  >
                                    <label class="custom-file-label" for="cover_image2">อัปโหลดรูปREGISTRATION CERTIFICATE</label>
                                </div>
                            </div>

                          
                        </div>
                        <h6 class="text-center">CERTIFIED PEDIGREE</h6>
                        <div class="form-row">
                            
                          <div class="col-md-4 mb-3">
                                <label  for="formGroup File">อัพโหลดใบCP</label>
                                <div class="custom-file">
                                <input type="file" name="cover_image1" id="cover_image1" class="custom-file-input"  >
                                <label class="custom-file-label" for="cover_image1">อัปโหลดรูปCERTIFIED PEDIGREE</label>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                                <label  for="formGroup File">อัพโหลดรูปสุนัข</label>
                                <div class="custom-file">
                                       
                                    <input type="file" name="cover_image[]"  class="custom-file-input"  multiple accept=".png, .jpg, .jpeg" >
                                    <label class="custom-file-label" for="cover_image[]">Choose file</label>
                                </div>
                          </div>
                        </div>
                        <h6 class="text-center">รายละเอียด(จะโชว์ในหน้าขายสุนัข)</h6>
                        <div class="form-row">
                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">ราคา</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ราคาตามสาพันธุ์">
                                        </div>
                                </div>
                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">ลักษณะ</div>
                                            </div>
                                            <select class="custom-select">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                        </div>
                                </div>
                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">title</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ราคาตามสาพันธุ์">
                                        </div>
                                </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">รายละเอียดเกี่ยวกับสุนัข</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name='Detail'></textarea>
                            </div>
                            
                         
                        </div>

                       
                                
                                  
                        
                        <button class="btn btn-primary" type="submit">เพิ่ม</button>
                      </form>
        </div>
    </div>

@endsection