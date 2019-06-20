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
        
    <div class="container form-lg-left text-center ">
           
            <h1 class="text-center">กรอกข้อมูลโพสสุนัขเพื่อขาย</h1>
        
            
            <div class="">

                    <div class="col-md-8">
                    <img class="img-fluid img-thumbnai" src="/storage/public/imagedog/cover_images/{{$post->imagedog}}" style="width:500px; height:500px;">
                    
                    </div>
                </div>
        <form method="post" action="/{{{auth()->user()->id}}}/{{$post->ID_dog}}/post" enctype="multipart/form-data" class="text-center" novalidate >
                        @csrf
                        
                        <div class="">

                                <div class="col-md-4">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">หัวข้อโพสขาย</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup1" placeholder="หัวข้อโพสขาย"  name="title_post">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">ราคา</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup2" placeholder="ราคาตามสาพันธุ์" name="price">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text" name='type_dog'  required>ลักษณะ</div>
                                            </div>
                                            <select class="custom-select" name='type_dog'>
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">ตัวเล็ก</option>
                                                    <option value="2">ตัวใหย๋</option>
                                                    
                                                  </select>
                                        </div>
                                </div>

                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">อายุสุนัข(ตอนนี้)</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup3" placeholder="อายุสุนัข(ตอนนี้)" name="Age_Dog">
                                        </div>
                                </div>
                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">ชื่อฟาร์ม</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup4" placeholder="ชื่อฟาร์ม" name='Farm_name'>
                                        </div>
                                </div>
                                <div class="col-auto">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">เบอร์โทรติดต่อ</div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup5" placeholder="เบอร์โทรติดต่อ" name="tel_post">
                                        </div>
                                </div>
                                <div class="col-2">
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text">วัคชีน</div>
                                            </div>
                                            <select class="custom-select" name="vaccine">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                        </div>
                                </div>
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">รายละเอียดเกี่ยวกับสุนัข</span>
                                        </div>
                                        <textarea class="form-control" aria-label="With textarea" name='Detail_Dog'></textarea>
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
    

@endsection