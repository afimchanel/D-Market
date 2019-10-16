@extends('layouts.app')
@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<img class="img-responsive img-fluid" id="imgs" src="/payment.jpg" style="width:500px; height:500px;">
<div class="container"><a href="/Payment"><button>แจ้งชำระเงิน กรุณาชำระภานยใน6ช.ม ไม่งั้นคุณจะโดนหักคะแนน </button></a></div>

@endsection
