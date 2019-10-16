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
                    <th>idโพส</th>
                    <th>idสุนัข</th>
                    <th>idเจ้าของโพส</th>
                    <th>ราคา</th>
                    <th>ชื่อฟาร์ม</th>
                    <th>เบอร์โทร</th>
                    <th>จำนวนวัคซีน</th>
                    <th>ขายแล้ว</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->Post_id}}</td>
                        <td>{{$post->id_the_dog}}</td>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->price}}</td>
                        <td>{{$post->farm_name}}</td>
                        <td>{{$post->tel_post}}</td>
                        <td>{{$post->vaccine}}</td>
                        <td>
                            @if ($post->Status == 2 )
                                ได้ขายไปแล้ว
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection