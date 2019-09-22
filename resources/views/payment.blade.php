@extends('layouts.app')
<?php 
    use App\orderdetail;
    use App\orders;

    $orderid = orders::where('id_user',Auth::user()->id)
    ->where('Status',0)
    ->Orderby('updated_at','desc')->first();
    $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
    ->Where('order_detail.order_id','!=',NULL)
    ->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
    ->join('users', 'order_detail.id_user', '=', 'users.id')
    ->join('posts','order_detail.id_post','=','posts.Post_id')
    ->join('order','order_detail.order_id','=','order.Order_ID')
    ->where('order_detail.order_id',$orderid->Order_ID)
    ->get();


    // ->Orderby('order_detail.updated_at','desc')->limit(1)

    $total = 0
    
 ?>
@section('content')




<img class="img-responsive img-fluid" src="/payment.jpg" style="width:500px; height:500px;">
<table class="table col-md-6 container-fluid">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  
    <thead>
        <tr>
            <th scope="col"># รหัสการสั่งซ์้อ</th>
            <th scope="col">ชื่อโพส</th>
            <th scope="col">ราคา</th>

        </tr>
    </thead>
    <tbody> 
        @if ($order != NULL)
            @foreach($order as $item)
            <tr>
                <th scope="row">{{$item->Order_detail}}</th>
                <td>{{$item->Breed}}{{$item->title_post}}</td>
                <td>{{$item->price}}</td>
                <?php $total = $total + $item->price ?>
                
            </tr>
            @endforeach
        @else
             <tr>
                <th scope="row"></th>
                <td></td>
                <td>0</td>
               
                
            </tr>
        @endif
            
            <caption>ค่าขนส่ง : ?? จำนวนตัว *(นน+ค่าจักส่ง) </caption>
            <caption>ราคารวมทั้งสิ้น : {{$total}}</caption>
    </tbody>
</table>


เพิ่ม ช่องสถานะในตาราง post  ทำเช็คบล้อคที่เลือกธนาคารที่โอนด้วย ทำคำนวนค่าจัดส่ง 
    <div class="container">
        <form action="{{ route('Payment.store') }}" enctype="multipart/form-data" method="post">
            @csrf 
            <div class="row">
                
                <div class="col-25">
                    <label>จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี</label>
                </div>
                <div class="col-75">
                    <input type="text" placeholder="จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี" name="price_payment" value="{{$total}}"  required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">วันที่โอนและเวลาโอนเงิน</label>
                </div>
                <div class="col-75">
                    <input type="datetime-local" name='Transferdate' required>
                </div>
            </div>
            <div class="row">
                    <div class="col-25">
                        <label for="country">เบอร์โทรติดต่อ</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name='tel_Customer' required>
                    </div>
                </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">สนามบินที่ใกล้ที่สุด</label>
                </div>
                <div class="col-75">
                    <input type="text" placeholder="(เป็นสถานที่รับสุนัข)" name="receiving_location"required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">หลักฐานการชำระเงิน</label>
                </div>
                <div class="col-75">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_payment" required>
                        <label class="custom-file-label" for="inputGroupFile01">หลักฐานการชำระเงิน</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">สำเนาบัตรประชาชน</label>
                </div>
                <div class="col-75">
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_payment_IDcardnumber" required>
                        <label class="custom-file-label" for="inputGroupFile01">สำเนาบัตรประชาชน</label>
                    </div>
                </div>
            </div>
            <div style="text-align:center;">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

</div>



@endsection