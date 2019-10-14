<?php 
use App\orderdetail;
use App\orders;
$orderid = orders::where('id_user',Auth::user()->id)
->where('Status',2)
->Orderby('updated_at','desc')->first();
if ($orderid == NULL) {
  return $order = NULL;
} else {
  $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
->LEFTjoin('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->LEFTjoin('posts', 'order_detail.id_post', '=', 'posts.Post_id')
->LEFTjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')
->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
->where('order.Status',2)
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
              
            </dl>
            <div class="col-3  col-md-6 text-md-right" style="padding-top: 5px">
              <dl class="param param-inline small">
                <dt>ราคา: {{$item->price}}</dt>
                <dt> </dt>
              </dl>
            </div>
            
          </figcaption>
        </figure> 
    @endforeach

@endif


