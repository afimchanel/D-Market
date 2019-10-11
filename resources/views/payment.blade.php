@extends('layouts.app')
<?php 
    use App\orderdetail;
    use App\orders;
    
    $orderid = orders::where('id_user',Auth::user()->id)
    ->where('Status',0)
    ->Orderby('updated_at','desc')->first();

    if ($orderid == NULL) {
        
        $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
    
        ->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
        ->join('users', 'order_detail.id_user', '=', 'users.id')
        ->join('posts','order_detail.id_post','=','posts.Post_id')
        ->join('order','order_detail.order_id','=','order.Order_ID')
        ->where('order_detail.order_id',0)
        ->get();
    }else {
        $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
        ->Where('order_detail.order_id','!=',NULL)
        ->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
        ->join('users', 'order_detail.id_user', '=', 'users.id')
        ->join('posts','order_detail.id_post','=','posts.Post_id')
        ->join('order','order_detail.order_id','=','order.Order_ID')
        ->where('order.Status',0)
        ->get();
    } 
    


    // ->Orderby('order_detail.updated_at','desc')->limit(1)

    $total = 0;
    $transportation = 0;
    $t = 590;
 ?>
@section('content')
<img class="img-responsive img-fluid" id="imgs" src="/payment.jpg" style="width:500px; height:500px;">
<table class="table col-md-6 container-fluid">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(session()->get('mm'))
  <div class="alert alert-danger">
    {{ session()->get('mm') }}  
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
        @if (isset($order))
            @foreach($order as $item)
            <tr>    
                    
                    <?php 
                    if(date("Y-m-d H:i:s",strtotime($item->updated_at)) <= date("Y-m-d H:i:s")){
                        
                        $delete = orders::find($item->Order_ID);
                        $delete->delete();
                        $delete1 = orderdetail::where('order_id',$item->Order_ID)->get();
                        foreach ($delete1 as $item1) {
                            $item1->delete();
                        }
                        
                        // $user = Auth::user()->id == $item->id_user;
                        // $user->score = $user->score - 1 ;
                        // $user->save();
                        return redirect()->back();
                    }

                    ?>
                    

                <th scope="row">{{$item->Order_detail}}</th>
                <td>{{$item->Detail_Dog}}</td>
                @if ($item->weight_dog == 1)
                    <?php    $transportation = 800; ?>
                @elseif($item->weight_dog == 2)
                    <?php   $transportation = 800;?>
                @elseif($item->weight_dog == 3)
                    <?php   $transportation = 1000; ?>
                @endif  </strong></h6> 
                <td>{{$item->price}}</td>
                <?php $total = $total + $item->price ?>
                
            </tr>
            @endforeach
        @endif
            
            <caption>ค่าขนส่ง : {{$transportation}}+ค่าบล็อคขนสุนัข:{{$t}} </caption>
            <caption>ราคารวมทั้งสิ้น : {{$total + $transportation +  $t}}</caption>
    </tbody>
</table>
    <div class="container">
        <form action="{{ route('Payment.store') }}" enctype="multipart/form-data" method="post">
            @csrf 
            <div class="row">
                @if(isset($orderid))
                <input type="text" name="order_id" value="{{$orderid->Order_ID}}"@error('order_id') is-invalid @enderror style="display: none;">
                <input type="text" name="total" value="{{$total + $transportation +  $t}}"style="display: none;">
                 @endif
                 @error('order_id')
                 <span class="invalid-feedback" role="alert">
                   <strong>{{ ไม่มีออเดอร์ }}</strong>
                 </span>
                 @enderror
                <div class="col-25">
                    <label>จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี</label>
                </div>
                <fieldset >
                <div class="col-75">
                    <input type="text" placeholder="จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี" name="price_payment" value="{{$total+ $transportation +  $t}}"  required>
                </div>
                </fieldset>
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
                    <label for="subject">หลักฐานการชำระเงิน</label> [ ไฟล์ jpg,gif,png,pdf ไม่เกิน2MB]
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