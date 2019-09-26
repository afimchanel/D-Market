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
                    <th>Post_id</th>
                    <th>id_the_dog</th>
                    <th>user_id</th>
                    <th>price</th>
                    <th>farm_name</th>
                    <th>tel_post</th>
                    <th>vaccine</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->Post_id}}</td>
                        <td>{{$post->Post_id_the_dog}}</td>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->price}}</td>
                        <td>{{$post->farm_name}}</td>
                        <td>{{$post->tel_post}}</td>
                        <td>{{$post->vaccine}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection