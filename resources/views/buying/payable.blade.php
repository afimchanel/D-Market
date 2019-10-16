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
?>

@foreach ($order as $item)
{{$item->order_id}}
    <figure class="media">
      <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm"style="width:250px; height:250px;"></div>
      <figcaption class="media-body">
        <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"> <h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
        <dl class="param param-inline small">
            
        </dl>
        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
          <dl class="param param-inline small">
            <dt>ราคา: {{$item->price}}</dt>
            <dd>ดูข้อมูลการชื้อ</dd>
            <a href="/order/delete/{{$item->order_id}}"><button>ยกการสั่งชื้อ</button></a>
            
          </dl>
        </div>
        
      </figcaption>
    </figure> 
@endforeach
