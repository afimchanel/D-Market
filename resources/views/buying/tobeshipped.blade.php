<?php 
use App\orderdetail;
use App\orders;
$orderid = orders::where('id_user',Auth::user()->id)
->where('Status',1)
->Orderby('updated_at','desc')->first();
if ($orderid == NULL) {
  return $order = NULL;
} else {
  $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
->LEFTjoin('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->LEFTjoin('posts', 'order_detail.id_post', '=', 'posts.Post_id')
->LEFTjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')
->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
->where('order.Status',1)
->get();
}



?>

@if(isset($order))
      @foreach ($order as $item)
    {{$item->Order_detail}} ทำที่แบบว่าถ้า10ชมแล้ว คนขายไม่่ส่งหมา ให้ส่งsms เตือน
        <figure class="media">
          <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm" style="width:250px; height:250px;"></div>
          <figcaption class="media-body">
          <h6 class="title text-truncate">{{$item->title_post}}</h6>
            <dl class="param param-inline small">
              <dt>ส่งไปที่ไหน: 
                  @if ($item->receiving_location === NULL)
                                ยังไม่ไดส่ง
                        @else
                            {{$item->receiving_location}} 
                            @endif
                </dt>
              <dd>สถานะ : รอส่ง</dd>
            </dl>
            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
              <dl class="param param-inline small">
                <dt>ราคา: {{$item->price}}</dt>
         
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeShoes{{$item->Order_detail}}">
                  <dd>ดูข้อมูลการชื้อ</dd>
                  </button>
                  
                  <!-- The modal -->
                  <div class="modal fade" id="largeShoes{{$item->Order_detail}}" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  
                  <div class="modal-header">
                  <h4 class="modal-title" id="modalLabelLarge">รายละเอียดข้อมูล</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <p class="text-dark m-0">รหัสใบPaymnet {{$item->Pay_ID}} </p>
                  <p class="text-dark m-0">หมายเลขออเดอร์: {{$item->Order_ID}} </p>
                  <p class="text-dark m-0">ราคา: {{$item->price_payment}} </p>
                  <p class="text-dark m-0">สถานที่ที่ได้รับ: {{$item->receiving_location}}</p>
                  <p class="text-dark m-0">เบอร์โทรลูกค้า: {{$item->tel_Customer}} </p>
                  <p class="text-dark m-0">วันที่โอน: {{$item->Transferdate}} </p>
                  หลักฐานการโอน
                  <img src="/storage/public/image_payment/{{$item->image_payment}}" style="width:70px; height:70px;" class="css-class" alt="alt text">
                  รูปบัตร ปชช
                  <img src="/storage/public/image_payment_IDcardnumber/{{$item->image_payment_IDcardnumber}}" style="width:70px; height:70px;" class="css-class" alt="alt text">

                  </div>
                  </div>
                  </div>

                
              </dl>
            </div>
            
          </figcaption>
        </figure> 
    @endforeach
@else
    ;jk
@endif


