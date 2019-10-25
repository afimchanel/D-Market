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
    
        <figure class="media">
          <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm" style="width:250px; height:250px;"></div>
          <figcaption class="media-body">
            <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"> <h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
            <dl class="param param-inline small">
              <dd>สถานะ : รอส่ง</dd>
              <dd>ราคา: {{$item->price}}</dd>
              <p class="text-dark m-0">รหัสใบPaymnet {{$item->Pay_ID}} </p>
              <p class="text-dark m-0">หมายเลขออเดอร์: {{$item->Order_ID}} </p>
              <p class="text-dark m-0">ราคา: {{$item->price_payment}} </p>
              <p class="text-dark m-0">สถานที่ที่ได้รับ: {{$item->receiving_location}}</p>
              <p class="text-dark m-0">เบอร์โทรลูกค้า: {{$item->tel_Customer}} </p>
              <p class="text-dark m-0">วันที่โอน: {{$item->Transferdate}} </p>
              หลักฐานการโอน
              <img src="/storage/public/image_payment/{{$item->image_payment}}" style="width:70px; height:70px;" class="css-class" alt="alt text">

            
          </figcaption>
        </figure> 
    @endforeach
@else
    ;jk
@endif


