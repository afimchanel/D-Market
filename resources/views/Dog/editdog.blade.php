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
            <h3 class="text-center">แก้ไขข้อมูลใบเพ็ด</h3>
            <h6 class="text-center">REGISTRATION CERTIFICATE</h6>
            <br><br>
           <div class="row h-100 justify-content-center align-items-center">
                <form method="post" action="{{ route('dog.update',$Dogs->id) }}">
                        @csrf
                            <div class="form-group">
                                    <label for="formGroup Gene">สายพันธุ์สุนัข</label>
                                    <input type="text" class="form-control" id="formGroup Gene" name="Breed"placeholder="สายพันธุ์สุนัข" value="{{$Dog->Breed}} >
                                </div>
                        
                                <div class="form-group">
                                    <label for="formGroup IDdog"> ไอดีสุนัข </label>
                                    <input type="text" class="form-control" id="formGroup IDdog" name="IDthedog" placeholder="ไอดีสุนัข">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup id"> เลขทะเบียนพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup id" name="Registrationspecies" placeholder="เลขทะเบียนพันธุ์">
                                </div>
                            
                                <div class="form-group">
                                    <label for="formGroup Num"> เลขไมโครชิพ </label>
                                    <input type="text" class="form-control" id="formGroupNum" name="Nomicroship" placeholder="เลขไมโครชิพ">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Color"> สี </label>
                                    <input type="text" class="form-control" id="formGroup Color" name="color" placeholder="สี">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Gender"> เพศ </label>
                                    <input type="text" class="form-control" id="formGroup Gender" name="SEX" placeholder="เพศ">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Father"> พ่อพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Father" name="Fathet" placeholder="พ่อพันธุ์">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Mather"> แม่พันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Mather" name="Momher" placeholder="แม่พันธุ์">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Birth"> วันเกิด </label>
                                    <input type="text" class="form-control" id="formGroup Birth" name="birthday" placeholder="วันเกิด">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Nbreeder"> ชื่อผู้เพาะพันธุ์ </label>
                                    <input type="text" class="form-control" id="formGroup Nbreeder" name="Breedername" placeholder="ชื่อผู้เพาะพันธุ์">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Owner"> เจ้าของ </label>
                                    <input type="text" class="form-control" id="formGroup Owder" name=" Owner" placeholder="เจ้าของ">
                                </div>
                
                                <div class="form-group">
                                    <label for="formGroup Regis"> วันออกทะเบียน</label>
                                    <input type="text" class="form-control" id="formGroup Regis" name="Registration date" placeholder="วันออกทะเบียน">
                                </div>
                
                                <div class="form-group ">
                                    <label  for="formGroup File">อัพโหลดไฟล์</label>
                                    <div class="custom-file">
                                        <input type="file" name="imageRC" id="formGroup File" id="filepicture" class="custom-file-input">
                                        <label class="custom-file-label" for="filepicture">Choose file</label>
                                    </div>
                                </div>
                                
                                <hr>
                                <h6 class="text-center">CERTIFIED PEDIGREE</h6>
                        <br><br>

                        <div class="form-group ">
                            <label  for="formGroup File">อัพโหลดไฟล์</label>
                            <div class="custom-file">
                                <input type="file" name="imageCP" id="filepicture" class="custom-file-input">
                                <label class="custom-file-label" for="filepicture">Choose file</label>
                            </div>
                        </div> <br> 
                        <div class="form-group ">
                                <label  for="formGroup File">อัพโหลดรูปสุนัข</label>
                                <div class="custom-file">
                                    <input type="file" name="imagedog" id="filepicture" class="custom-file-input">
                                    <label class="custom-file-label" for="filepicture">Choose file</label>
                                </div>
                            </div> <br> 
        
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                <button type="submit" class="btn btn-primary">ตกลง</button>
                                </div>
                            </div>
                         </div><br><br><br>
                                                        
                    </form>
                </div>
               
                 </div>

            </form>
        </div>
    </div>

@endsection