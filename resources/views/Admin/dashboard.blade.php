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
              <th>ID</th>
              <th class="avatar">Avatar</th>
              <th>ชื่อ-นามสกุล</th>
              <th>E-Mail</th>
              <th>Tel</th>
              <th>เลขบัญชี</th>
              <th>แก้ไข</th>
              <th>ลบ</th>
            </tr>
          </thead>
  
  
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td class="avatar">
                <div class="round-img">
                  <img class="img-fluid img-thumbnail" src="/storage/avatars/{{$user->Avatar}}" >
                </div>
              </td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->Tel }}</td>
              <td>{{ $user->accountnumber}}</td>
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



@endsection