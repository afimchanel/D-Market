<?php 
use App\orderdetail;
use App\orders;
$orderid = orders::where('id_user',Auth::user()->id)
->where('Status',3)
->Orderby('updated_at','desc')->first();
if ($orderid == NULL) {
  return $order = NULL;
} else {
  $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
->LEFTjoin('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->LEFTjoin('posts', 'order_detail.id_post', '=', 'posts.Post_id')
->LEFTjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')
->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
->where('order.Status',3)
->get();
}



?>

@if(isset($order))
      @foreach ($order as $item)
    {{$item->Order_detail}} ทำที่แบบว่าถ้า10ชมแล้ว คนขายไม่่ส่งหมา ให้ส่งsms เตือน
        <figure class="media">
          <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm"></div>
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
              <dd>สถานะ : รอรับสุนัข</dd>
            </dl>
            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
              <dl class="param param-inline small">
                <dt>ราคา: {{$item->price}}</dt>
                <dd>ดูข้อมูลการชื้อ</dd>
                <a href="Payment/geted/{{$item->Order_ID}}"><button type="button" class="btn btn-success">ได้รับสุนัขแล้ว</button></a>


                
              </dl>
            </div>
            
          </figcaption>
        </figure> 
    @endforeach
@else
    ;jk
@endif


