@extends('layouts.app1')

@section('content')
<?php use App\User;?>


<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class=" container">

        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                    <th>รหัส</th>
                    <th>รายละเอียด</th>
                    <th>ชื่อผู้ส่ง</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                             <?php   
                             
                             $finduser = User::find($item->id_user);

                            ?>
                                {{$finduser->NameSurname}}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection