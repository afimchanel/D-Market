@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container ">

  <div class="row">
    <div class="col-lg-9 ">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">ขายไปแล้วและโอนเงินแล้ว</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-payable-tab" data-toggle="pill" href="#pills-payable" role="tab" aria-controls="pills-payable" aria-selected="false">ที่ต้องชำระ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-transport-tab" data-toggle="pill" href="#pills-transport" role="tab" aria-controls="pills-transport" aria-selected="false">ที่เราต้องจัดส่ง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-Tobeshipped-tab" data-toggle="pill" href="#pills-Tobeshipped" role="tab" aria-controls="pills-Tobeshipped" aria-selected="false">รอจัดส่ง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-get-tab" data-toggle="pill" href="#pills-get" role="tab" aria-controls="pills-get" aria-selected="false">ที่ต้องได้รับ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-finish-tab" data-toggle="pill" href="#pills-finish" role="tab" aria-controls="pills-finish" aria-selected="false">ชื้อสำเร็จแล้ว</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">@include('buying.all')</div>
        <div class="tab-pane fade" id="pills-payable" role="tabpanel" aria-labelledby="pills-payable-tab">@include('buying.payable')</div>
        <div class="tab-pane fade" id="pills-transport" role="tabpanel" aria-labelledby="pills-transport-tab">@include('buying.transport')</div>
        <div class="tab-pane fade" id="pills-Tobeshipped" role="tabpanel" aria-labelledby="pills-Tobeshipped-tab">@include('buying.tobeshipped')</div>
        <div class="tab-pane fade" id="pills-get" role="tabpanel" aria-labelledby="pills-get-tab">@include('buying.get')</div>
        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">@include('buying.finish')</div>
      </div>

     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection