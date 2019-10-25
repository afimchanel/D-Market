@extends('layouts.app2')

@section('content')

<!-- Page Content -->
<div class="container ">

        <div class="row">
          <div class="col-lg-9 ">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">ออเดอร์ที่ต้องรับส่ง</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-payable-tab" data-toggle="pill" href="#pills-payable" role="tab" aria-controls="pills-payable" aria-selected="false">ที่ต้องชำระ</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">@include('transport.order')</div>
              <div class="tab-pane fade" id="pills-payable" role="tabpanel" aria-labelledby="pills-payable-tab">@include('buying.payable')</div>

            </div>
      
           
          </div>
          <!-- /.col-lg-9 -->
      
        </div>
        <!-- /.row -->
      
      </div>
      <!-- /.container -->

@endsection