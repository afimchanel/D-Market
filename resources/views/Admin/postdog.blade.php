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
                    <th>IDcardnumber</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection