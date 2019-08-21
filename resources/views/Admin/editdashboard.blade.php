@extends('layouts.app1')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class=" container">
      <div class="card-header">
      <strong class="card-title">แก้ไขรายชื่อสมาชิก <a href='{{'/admin/dashboard'}}' class="btn btn-warning">กลับไปยังหน้าDashboard</a></strong>
        <div class="card-body">
          <div class="table-responsive">
            <form method="post" action="/admin/dashboard/edit/{{$user->id}}/update">
              <div class="form-group">
                @csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <strong>ชื่อ-นามสกุล :</strong>
                      <input type="text" class="form-control" name="name" value="{{$user->name}}">
                      <label>DateofBirth</label><br>
                      <input type="date" class="form-control" name="DateofBirth" value="{{$user->DateofBirth}}" />
                      <label>Tel</label><br>
                      <input type="text" class="form-control" name="Tel" value="{{$user->Tel}}" />
                      <label>SEX</label><br>
                      <input type="text" class="form-control" name="SEX" value="{{$user->SEX}}" />
                      <label>IDcardnumber</label><br>
                      <input type="text" class="form-control" name="IDcardnumber" value="{{$user->IDcardnumber}}" />
                      <label>address</label><br>
                      <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                    </tr>
                  </thead>
                </table>
              </div><br>
              <button class="btn btn-primary " type="submit">บันทึก</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


{{-- <div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class=" container">
        <div class="card mb-3">
          <div class="card-header">
            แก้ไขรายชื่อสมาชิก    <a href='{{'/admin/dashboard'}}'  class="btn btn-warning">กลับไปยังหน้าDashboard</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <form method="post" action= "/admin/dashboard/edit/{{$user->id}}/update">
                  <div class="form-group">
                      @csrf
                      
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <strong>ชื่อ-นามสกุล :</strong>
                          <input type="text" class="form-control" name="name" value="{{$user->name}}">
                          <label>DateofBirth</label><br>
                          <input type="date" class="form-control" name="DateofBirth" value="{{$user->DateofBirth}}"/>
                          <label>Tel</label><br>
                          <input type="text" class="form-control" name="Tel" value="{{$user->Tel}}"/>
                          <label>SEX</label><br>
                          <input type="text" class="form-control" name="SEX" value="{{$user->SEX}}"/>
                          <label>IDcardnumber</label><br>
                          <input type="text" class="form-control" name="IDcardnumber" value="{{$user->IDcardnumber}}"/>
                          <label>address</label><br>
                          <input type="text" class="form-control" name="address" value="{{$user->address}}"/>

                          
                        </tr>
                        
                      </thead>
                      
                    </table>
            
                  </div>  
                <button class="btn btn-primary " type="submit">บันทึก</button>
                </div>
              </form>
        </div>
    </div>
</div>
</div> --}}


@endsection