@extends('layouts.app1')

@section('content')
<?php

use App\User;
use App\payment;
use App\Dog;
use App\breed_dog;
use App\orderdetail;
use App\color_dog;
use App\orders;
use App\historytransportation; 
?>

<div class="w3-main" style="margin-left:30px;margin-top:43px;">
  <div class=" container">
    <div class="card-header">
      <strong class="card-title">รายชื่อสมาชิกทั้งหมด</strong>
    </div>
    <div class="table-stats order-table ov-h">
      <table class="table ">
        <thead>
          <tr>
            <th>รายการสั่งซื้อที่</th>
            <th>ผู้ซื้อ</th>
            <th>ผู้ขาย</th>
            <th>สุนัขที่ทำการจัดส่ง</th>
            <th>ราคาทั้งหมด</th>
            <!-- <th>สถานที่ต้องไปรับ</th> -->
            <!-- <th>เบอร์ผู้ซื้อ</th> -->
            <th>วันเวลาที่ผู้ชื้อจ่ายเงิน</th>
            <th>อนุมัติโอนเงิน</th>
            
            <th>รูปใบการชำระเงิน</th>
            <th>สถานะการขนส่งสุนัข</th>
            <th>สถานะการโอนเงิน</th>
            <th>สถานะการชื้อขาย</th>
          </tr>
        </thead>


        <tbody>
          @foreach($payment as $item)
          <tr>
            <td>{{ $item->Order_ID }}</td>
            <td>
              <?php
              $ownnow1 = User::find($item->id_user);
              ?>
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#payment{{ $item->id_user }}">รายละเอียด</button>
              <!-- The Modal -->
              <div class="modal" id="payment{{ $item->id_user }}">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">รายละเอียด</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>{{$ownnow1->email}}</p>
                      <p>{{$ownnow1->name}}</p>
                      <p>{{$ownnow1->NameSurname}}</p>
                      <p> {{$ownnow1->Tel}}</p>
                      <p> {{$ownnow1->Farmaddress}}</p>
                      <p> {{$ownnow1->accountnumber}}</p>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <?php
              $ownnow1 = User::find($item->user_id);
              ?>
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#payment{{ $item->user_id }}">รายละเอียด</button>
              <!-- The Modal -->
              <div class="modal" id="payment{{ $item->user_id }}">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">รายละเอียด</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>{{$ownnow1->email}}</p>
                      <p>{{$ownnow1->name}}</p>
                      <p>{{$ownnow1->NameSurname}}</p>
                      <p>{{$ownnow1->Tel}}</p>
                      <p>{{$ownnow1->Farmaddress}}</p>
                      <p> {{$ownnow1->accountnumber}}</p>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

            </td>


            <td>

              <div class="container">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#de{{ $item->Order_ID }}">ดูรายละเอียด</button>

                <!-- The Modal -->
                <div class="modal" id="de{{ $item->Order_ID }}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">รายละเอียด</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">

                        <?php
                        $finddog = payment::where('Order_ID', $item->Order_ID)->first();
                        $finddog1 = orderdetail::where('order_id', $finddog->Order_ID)->first();
                        $finddog2 = Dog::find($finddog1->id_the_dog);
                        ?>
                        <img height="350" width="350" src="/storage/public/imagecover/{{$finddog2->image}}">
                        <p>รหัสสุนัข : {{$finddog2->idthedog}}</p>

                        <p> ชื่อสุนัข : {{$finddog2->namedog}}</p>

                        <p>พันธุ์ :
                          <?php
                          $breed = breed_dog::find($finddog2->breed);
                          ?>
                          {{$breed->name_breed}}</p>
                        <?php
                        $color = color_dog::find($finddog2->color);
                        ?>
                        <p>สี : {{$color->name_color}}</p>
                        <p>เพศ : ตัวผู้</p>
                        <p>ชื่อพ่อพันธุ์ : {{$finddog2->father}}</p>
                        <p>ชื่อแม่พันธุ์ : {{$finddog2->momher}}</p>
                        <p>วันเกิดสุนัข : {{$finddog2->birthday}}</p>
                        <p>เจ้าของ : {{$finddog2->breedername}}</p>
                        <p>ชื่อผู้เพาะพันธุ์ : {{$finddog2->owner}}</p>
                        <p>ที่อยู๋ที่ต้องจัดส่ง : {{$item->address}}อำเภอ: {{$item->district}} จังหวัด : {{$item->province}}</p>

                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>

            <td>{{ $item->price_payment }}</td>
            <td>

              {{ $item->Transferdate }}

            </td>
            <td>
              @if ($item->Status == 0)
              <a href="/Payment/success/{{$item->Order_ID}}"><button type="button" class="btn btn-success">ยืนยัน</button></a>
              <!-- <button class="btn btn-danger">ยกเลิก/คืนเงิน</button> -->
              @endif

            </td>


            <!-- <td>
              @if ($item->receiving_location != NUll)
                สนามบิน{{$item->receiving_location}}
              @elseif($item->pick_your_own != NULL)
                จะมารับเองที่{{$item->pickyourown}}
              @elseif($item->address != NULL)
              {{$item->address}}
                {{$item->district}}
                {{$item->province}}
              @endif
            </td> -->



            <!-- <td>{{ $item->tel_Customer }}</td>-->

            <td>
              @if($item->Status != 0)
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#de{{ $item->price_payment }}">ดูรายละเอียด</button>

              <!-- The Modal -->
              <div class="modal" id="de{{ $item->price_payment }}">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">รายละเอียด</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <img height="450" width="400" src="/storage/public/image_payment/{{$item->image_payment}}">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endif

            </td>
            <td>


              @if($item->Status == 3)
              <div class="container">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#y{{ $item->Order_ID }}">ดูรายละเอียด</button>

                <!-- The Modal -->
                <div class="modal" id="y{{ $item->Order_ID }}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">รายละเอียด</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <?php
                      $find = orders::find($item->Order_ID);
                      $de = historytransportation::where('idorder',$item->Order_ID)->get();

                      ?>
                        <?php
                        $finddog = payment::where('Order_ID', $item->Order_ID)->first();
                        $finddog1 = orderdetail::where('order_id', $finddog->Order_ID)->first();
                        $finddog2 = Dog::find($finddog1->id_the_dog);
                        ?>
                        <div class="p-4">
                          <h3>ประวัติการขนส่ง</h3>
                          <table class="table table-bordered track_tbl">
                            <thead>
                              <tr>
                            
                                
                                <th>จังหวัด</th>
                                <th>สถานะ</th>
                                <th>วันเวลา</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($de as $item2)
                              <tr class="active">
                                <td>{{$item2->provincename}}</td>
                                <td>{{$item2->statusname}}	</td>
                                <td>{{$item2->created_at}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @elseif($item->Status == 4 || $item->Status == 2)
              <?php
              $find = orders::find($item->Order_ID);
              ?>
              <div class="alert alert-success" role="alert">ถึงแล้ว </div>

              @endif
            </td>
            <td>
              @if ($item->Status == 2 || $item->Status == 5 )
              @if ($item->Status == 2)
              @if (date("Y-m-d H:i:s") >= date("Y-m-d H:i:s",strtotime($item->updated_at." +2 day")))
              <div class="alert alert-danger" role="alert">
                กรุณาโอนเงินไปยังผู้ขาย เพราะเลยเวลาแจ้งเหตุแล้ว
              </div>
              @endif
              {{-- {{date("Y-m-d H:i:s",strtotime($item->updated_at." +2 day"))}}
              รอผู้ชื้อแจ้งเหตุ 2 วัน --}}
              @endif

              <form method="POST" action="/Payment/finished/{{$item->order_id}}/{{$item->id_post}}" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <label for="formGroup File">อัพโหลดหลักฐานการโอน</label>
                <input type="file" name="proofoftransfer" accept=".png,.jpg,.jpeg">
                <button type="submit" class="btn btn-primary">โอนเงิน</button>
              </form>
              @elseif($item->Status == 1)
              <div class="alert alert-dark" role="alert">
                ยืนยันการโอนเงินแล้ว
              </div>
              @elseif($item->Status == 3)
              <div class="alert alert-dark" role="alert">
                ส่งสุนัข เวลาที่เริ่มส่ง{{$item->deliverytime}}
              </div>
              @elseif($item->Status == 0)
              <div class="alert alert-dark" role="alert">
                ผู้ชื้อโอนเงินมาแล้ว
              </div>
              @elseif($item->Status == 4)
              <div class="alert alert-success" role="alert">
                โอนเงินไปยังผู้ขายแล้ว ณ เวลา {{$item->updated_at}}
              </div>

              @endif
            </td>
            <td>@if($item->Status == 4)
              <div class="alert alert-success" role="alert">สำเร็จ</div>
              @else

              <div class="alert alert-danger" role="alert">
                ยังทำรายการไม่สำเร็จ
              </div>
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