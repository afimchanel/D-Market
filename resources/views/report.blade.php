@extends('layouts.app')

@section('content')
<form method="post" action='/report' enctype="multipart/form-data">
    @csrf
        <div class="form-group">
                <label for="exampleFormControlTextarea1">แจ้งเหตุหรือคำแนะนำ</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name" placeholder="กรุณาแจ้งอย่างละเอียด"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ส่ง</button>
</form>

@endsection