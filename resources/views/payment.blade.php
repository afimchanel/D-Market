@extends('layouts.app')
<?php 
use App\orderdetail;
$order = orderdetail::where('id_user',Auth::user()->id)
->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.ID_dog')
->join('users', 'order_detail.id_user', '=', 'users.id')
->join('posts','order_detail.id_post','=','posts.Post_id')
->get();
// $order->where('id_user',Auth::user()->id);
$total = 0
 ?>
@section('content')


<div id="timeline-wrap">
    <div id="timeline"></div>

    <!-- This is the individual marker-->
    <div class="marker mfirst timeline-icon one">
        <i class="fa fa-pencil"></i>
    </div>
    <!-- / marker -->

    <!-- This is the individual marker-->
    <div class="marker m2 timeline-icon two">
        <i class="fa fa-usd"></i>
    </div>
    <!-- / marker -->

    <!-- This is the individual marker-->
    <div class="marker m3 timeline-icon three">
        <i class="fa fa-list"></i>
    </div>
    <!-- / marker -->


    <!-- This is the individual marker-->
    <div class="marker mlast timeline-icon four">
        <i class="fa fa-check"></i>
    </div>
    <!-- / marker -->



</div>

<img class="img-responsive img-fluid" src="/payment.jpg" style="width:120px; height:120px;">
<table class="table col-md-6 container-fluid">
    
    <thead>
        <tr>
            <th scope="col"># รหัสการสั่งซ์้อ</th>
            <th scope="col">ชื่อโพส</th>
            <th scope="col">ราคา</th>

        </tr>
    </thead>
    <tbody> 
            @foreach($order as $item)
            <tr>
                <th scope="row">{{$item->Order_detail}}</th>
                <td>{{$item->Breed}}{{$item->title_post}}</td>
                <td>{{$item->price}}</td>
                <?php $total = $total + $item->price ?>
                
            </tr>
            @endforeach
      
            <caption>ราคารวมทั้งสิ้น : {{$total}}</caption>
    </tbody>
</table>


<form>เพิ่ม ช่องสถานะในตาราง post 
    <div class="container">
        <form action="{{ route('Payment.store') }}">
            <div class="row">
                <div class="col-25">
                    <label for="fname">จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี</label>
                </div>
                <div class="col-75">
                    <input type="text" placeholder="จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี" name="price_payment">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">วันที่โอนและเวลาโอนเงิน</label>
                </div>
                <div class="col-75">
                    <input type="datetime-local" name=''>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">สนามบินที่ใกล้ที่สุด</label>
                </div>
                <div class="col-75">
                    <input type="text" placeholder="(เป็นสถานที่รับสุนัข)" name="receiving_location">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">อัพโหลดหลักฐานการชำระเงิน</label>
                </div>
                <div class="col-75">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_payment">
                        <label class="custom-file-label" for="inputGroupFile01">หลักฐานการชำระเงิน</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">อัพโหลดสำเนาบัตรประชาชน</label>
                </div>
                <div class="col-75">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_payment_IDcardnumber">
                        <label class="custom-file-label" for="inputGroupFile01">สำเนาบัตรประชาชน</label>
                    </div>
                </div>
            </div><br><br>
            <div style="text-align:center;">
                <input type="submit" value="Submit">
            </div><br><br>
        </form>
    </div>
</form>
</div>



@endsection