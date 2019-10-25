
<?php 
use App\orderdetail;
use App\post;
//$idpost = post::where('user_id',Auth::user()->id)->get('Post_id');

$order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->join('users', 'order_detail.id_user', '=', 'users.id')
->join('posts','order_detail.id_post','=','posts.Post_id')
->where('posts.user_id',Auth::user()->id)
->join('order','order_detail.order_id','=','order.Order_ID')
->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
->where('order_detail.id_user','!=',Auth::user()->id)
->where('order.Status','>=',3)
->get();



// ->Orderby('order_detail.updated_at','desc')->limit(1)

$total = 0

?>

@foreach ($order as $item)

<figure class="media">
  <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm" style="width:250px; height:250px;"></div>
  <figcaption class="media-body">

    <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"><h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
    <dt>ราคา: {{$item->price}}</dt>
          
    @if ($item->Status == 3)
    สถานะ : ไปส่งแล้ว
   
    @elseif($item->Status == 4)
    สถานะ : ทางD-market โอนเงินมายังคุณแล้ว
    @endif
    <div class="col-sm-9"> หลักฐานการโอน :
        <img src="/storage/public/imageproofoftransfer/{{$item->proofoftransfer}}" style="width:300px; height:250px;">  
    </div>
    <div class="col-sm-9"> ลายเซ็นผู้รับสุนัข :
        <img src="/storage/public/imagesignature/{{$item->signature}}" style="width:150px; height:250px;">  
    </div>
  </figcaption>
</figure> 
@endforeach
