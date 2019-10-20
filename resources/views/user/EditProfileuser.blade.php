@extends('layouts.app')

@section('content')


<!-- ด้านบนหน้าร้าน -->

<div class="jumbotron jumbotron-fluid bg-light">


    <div class="container ">

        <div class="container">
                @if(session()->get('vd'))
                <div class="alert alert-danger">
                  {{ session()->get('vd') }}  
                </div><br />
                @endif 
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> กรุณากรอกข้อมูลเหล่านี้ให้ครบ<br><br>

                </div>
            @endif

            <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4">โปรไฟล์</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-left">
           
                <div class="col-sm-3  ">
                    <img class="img-fluid img-thumbnail" src="/storage/avatars/{{ Auth::user()->Avatar }}" alt="" style="width:224px; height:224px;">
                    <form action="/{id}/updateavater" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file @error('avatar') is-invalid @enderror"  name="avatar" id="avatarFile" aria-describedby="fileHelp">
                            
                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>ใส่รูปด้วยครับ</strong>
                            </span>
                            @enderror
                            <small id="fileHelp" class="form-text text-muted">โปรดอัพรูปไม่เกิน 2MB.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <form method="post" action="{{'/{id}/update'}}" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf

                        <label for="name">ชื่อฟาร์ม :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" />
                                                    
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>ใส่รูปด้วยครับ</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        @csrf

                        <label for="NameSurname">ชื่อ-นามสกุล:</label>
                        <input type="text" class="form-control @error('NameSurname') is-invalid @enderror" name="NameSurname" value="{{ Auth::user()->NameSurname }}" />
                                                    
                        @error('NameSurname')
                        <span class="invalid-feedback" role="alert">
                            <strong>ใส่รูปด้วยครับ</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tel">เบอร์โทรศัพท์ :</label>
                        <input type="text" class="form-control @error('Tel') is-invalid @enderror" name="Tel" value="{{ Auth::user()->Tel }}" />
                        @error('Tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>กรอกเบอร์โทรศัพท์ด้วยครับ</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="DateofBirth">เลขที่บัญชี:</label>
                        <input type="text" class="form-control" name="accountnumber" value="{{ Auth::user()->accountnumber }}" />
                        

                    </div>
                    
                    <div class="form-group">
                        <label for="membercode">รหัสสมาชิก:</label>
                       
                        <input type="text" class="form-control @error('membercode') is-invalid @enderror" name="membercode" value="{{ Auth::user()->membercode }}" >
                        @error('membercode')
                        <span class="invalid-feedback" role="alert">
                            <strong>กรอกที่อยู่ด้วยครับ</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group ">
                        ใบอนุญาตจากสมาคม(ถ้ามี)
                        <div class="custom-file input-group mb-2">
                            <input type="file" name="license" class="custom-file-input @error('license') is-invalid @enderror" accept=".png, .jpg, .jpeg" value="{{ Auth::user()->license}}" />
                            @error('license')
                            <span class="invalid-feedback" role="alert">
                                <strong>ใส่รูปด้วยครับ</strong>
                            </span>
                            @enderror
                            <label class="custom-file-label" for=""></label>
                        </div>
                    </div>
                    <div class="form-group ">
                        บัตรประจำตัวประชาชน 
                        
                            <input type="text" name="IDcardnumber" @error('IDcardnumber') is-invalid @enderror  value="{{ Auth::user()->IDcardnumber}}" />
                            @error('IDcardnumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>ใส่รูปด้วยครับ</strong>
                            </span>
                            @enderror
                            <label class="custom-file-label" for=""></label>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่ฟาร์ม</label>
                        <textarea class="form-control @error('Farmaddress') is-invalid @enderror" rows="3" name="Farmaddress">{{ Auth::user()->Farmaddress}}</textarea>
                        @error('Farmaddress')
                        <span class="invalid-feedback" role="alert">
                            <strong>กรอกรายละเอียดด้วย</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Header -->



@endsection