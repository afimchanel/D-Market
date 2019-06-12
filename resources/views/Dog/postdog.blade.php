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
        <div class="container h-100">

            <br><br>
            <h3 class="text-center">กรอกข้อมูลใบเพ็ด</h3>
            <h6 class="text-center">REGISTRATION CERTIFICATE</h6>
            <br><br>
           <div class="form-group-row h-100 justify-content-center align-items-center">
                <form method="post" action="{{ route('dog.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                    <label for="formGroup Gene">สายพันธุ์สุนัข</label>
                                    <input type="text" class="form-control" id="formGroup Gene" name="Breed"placeholder="สายพันธุ์สุนัข(ภาษาไทย)"required >
                                </div>
                        
                                <div class="form-group">
                                    <label for="formGroup IDdog"> ไอดีสุนัข </label>
                                    <input type="text" class="form-control" id="formGroup IDdog" name="IDthedog" placeholder="ไอดีสุนัข"required >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupDetail"> รายละเอียดการเกี่ยวสุนัข </label>
                                    <textarea class="form-control" rows="5" id="comment" name="Detail" placeholder="รายละเอียดการเกี่ยวสุนัข" required ></textarea>
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup id"> เลขทะเบียนพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup id" name="Registrationspecies" placeholder="เลขทะเบียนพันธุ์"required >
                                </div>
                            
                                <div class="form-group">
                                    <label for="formGroup Num"> เลขไมโครชิพ </label>
                                    <input type="text" class="form-control" id="formGroupNum" name="Nomicrochip" placeholder="เลขไมโครชิพ"required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Color"> สี </label>
                                    <input type="text" class="form-control" id="formGroup Color" name="color" placeholder="สี"required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Gender"> เพศ </label>
                                    <select class="form-control" id="SEX" name="SEX">
                                        <option></option>
                                        <option>ชาย</option>
                                   
                                        <option>หญิง</option>

                                      </select>
                                    
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Father"> พ่อพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Father" name="Father" placeholder="พ่อพันธุ์"required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Mather"> แม่พันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Mather" name="Momher" placeholder="แม่พันธุ์"required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Birth"> วันเกิด </label>
                                    <input type="date" class="form-control" id="formGroup Birth" name="birthday" placeholder="วันเกิด"required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Nbreeder"> ชื่อผู้เพาะพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Nbreeder" name="Breedername" placeholder="ชื่อผู้เพาะพันธุ์" required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Owner"> เจ้าของ </label>
                                    <input type="text" class="form-control" id="formGroup Owder" name=" Owner" placeholder="เจ้าของ" required >
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Regis"> วันออกทะเบียน</label>
                                    <input type="date" class="form-control" id="formGroup Regis" name="Registrationdate" placeholder="วันออกทะเบียน" required >
                                </div>

                                <div class="form-group ">
                                    <label  for="formGroup File">อัพโหลดรูปRC</label>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imageRC" accept=".png, .jpg, .jpeg"  >
                                        <label class="custom-file-label" for="imageRC">Choose file</label>
                                    </div>
                                </div>
                                
                                <hr>
                                <h6 class="text-center">CERTIFIED PEDIGREE</h6>
                                <br><br>
    
                                <div class="form-group ">
                                    <label  for="formGroup File">อัพโหลดรูปCP</label>
                                    <div class="custom-file">
                                        <input type="file" name="imageCP" id="imageCP" class="custom-file-input"  >
                                        <label class="custom-file-label" for="imageCP">Choose file มีก็ได้ไม่มีก็ได้</label>
                                    </div>
                                </div> <br> 
                                <div class="form-group ">
                                    <label  for="formGroup File">อัพโหลดรูปสุนัข</label>
                                    <div class="custom-file">
                                            
                                        <input type="file" name="cover_image"  class="custom-file-input"  multiple  >
                                        <label class="custom-file-label" for="cover_image">Choose file</label>
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

            </form>
        </div>
    </div>

@endsection