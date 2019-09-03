@extends('layouts.app')
@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<img class="img-responsive img-fluid" src="/payment.jpg" style="width:500px; height:500px;">

<a href="/Payment"><button>แจ้งชำระเงิน กรุณาชำระภานยใน2ช.ม</button></a>
@endsection
