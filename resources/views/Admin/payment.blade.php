@extends('layouts.app1')

@section('content')


<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class=" container">
      <div class="card-header">
        <strong class="card-title">รายชื่อสมาชิกทั้งหมด</strong>
      </div>
      <div class="table-stats order-table ov-h">
        <table class="table ">
          <thead>
            <tr>
              <th>username</th>
              <th>Order_ID</th>
              <th>ดูใบpayment</th>
              <th>price_payment</th>
              <th>receiving_location</th>
              <th>ดูรูปบัตรปชช</th>
              <th>tel_Customer</th>
              <th>Transferdate</th>
              <th>อนุมัตื</th>
            </tr>
          </thead>
  
          <!-- <div class="card-header">รายชื่อสมาชิกทั้งหมด</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ชื่อ-นามสกุล</th>
                      <th>E-Mail</th>
                      <th>Tel</th>
                      <th>IDcardnumber</th>
                      <th>แก้ไข</th>
                      <th>ลบ</th>
                    </tr>
                  </thead> -->
  
          <tbody>
            @foreach($payment as $item)
            <tr>
              <td>{{ $item->id_user}}</td>

              <td>{{ $item->Order_ID }}</td>

              <td><button type="button" class="btn btn-outline-info"></button></td>
              <td>{{ $item->price_payment }}</td>
              <td>{{ $item->receiving_location }}</td>
              <td><button type="button" class="btn btn-outline-info"></button></td>
              <td>{{ $item->tel_Customer }}</td>
              <td>{{ $item->Transferdate }}</td>
              <td><a href="/Payment/success/{{ $item->Order_ID}}" class="btn btn-success" >ยืนยัน</a>
              
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
    </div>
  </div>


{{-- <div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class=" container">
        <div class="card mb-3">
          <div class="card-header">
            รายชื่อสมาชิกทั้งหมด</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>E-Mail</th>
                    <th>Tel</th>
                    <th>IDcardnumber</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    
                  </tr>
                </thead>

                <tbody>
                  
                    @foreach($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->Tel }}</td>
                          <td>{{ $user->IDcardnumber }}</td>
                      <td><a href="/admin/dashboard/edit/{{$user->id}}" class="btn btn-primary">Edit</a></td>
                          <td>
                              <form action="/admin/dashboard/edit/{{$user->id}}/destroy" method="post">
                                @csrf
                                
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                              
                          </td>
                          
                      </tr>
                    @endforeach
                    
                  
                </tbody>
                
              </table>
              {{$users->links()}}
            </div>
          </div>
        </div>  
      </div>   --}}
@endsection