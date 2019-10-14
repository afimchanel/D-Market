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
   
        <figure class="media">
          <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm"></div>
          <figcaption class="media-body">
              <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"><h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
            <dl class="param param-inline small">
              <dt>ต้องรับที่: 
                      @if ($item->receiving_location != NUll)
                      สนามบิน{{$item->receiving_location}}
                      @elseif($item->pick_your_own != NULL)
                        จะมารับเอง
                      @elseif($item->address != NULL)
                        ที่อยู่{{$item->address}}
                      @endif
                      
                </dt>
                <dt>
                  หลักฐานการส่ง : {{$item->description}}
                </dt>
                <dt>
                    ราคา: {{$item->price}}
                </dt>
                <dt>
                
                    <dl class="param param-inline small">
                      
                      <div class="col-sm-9"> หลักฐานการส่งเพิ่มเติม :
                        <img src="/storage/public/imagedeliveryreceipt/{{$item->deliveryreceipt}}" style="width:300px; height:250px;">  
                      </div>
                      <a href="Payment/geted/{{$item->Order_ID}}/{{$item->id_post}}"><button type="button" class="btn btn-success">ได้รับสุนัขแล้ว</button></a>
      
                    </dl>
                      
                </dt>

            </dl>



            
            
          </figcaption>
        </figure> 
    @endforeach
@else
    ;jk
@endif


