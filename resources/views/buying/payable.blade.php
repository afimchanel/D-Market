<?php 
use App\orderdetail;
$order = orderdetail::where('order_detail.id_user',Auth::user()->id)
->where('order_detail.order_id',NULL)
->LEFTjoin('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->LEFTjoin('posts', 'order_detail.id_post', '=', 'posts.Post_id')
->LEFTjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')->get();

?>

@foreach ($order as $item)
{{$item->Order_detail}}
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
          <dd>สถานะ</dd>
        </dl>
        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
          <dl class="param param-inline small">
            <dt>ราคา: {{$item->price}}</dt>
            <dd>ดูข้อมูลการชื้อ</dd>
          </dl>
        </div>
        
      </figcaption>
    </figure> 
@endforeach
