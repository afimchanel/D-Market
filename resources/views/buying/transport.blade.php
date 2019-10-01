
<?php 
    use App\orderdetail;
    use App\post;
    //$idpost = post::where('user_id',Auth::user()->id)->get('Post_id');

    $order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
    ->join('users', 'order_detail.id_user', '=', 'users.id')
    ->join('posts','order_detail.id_post','=','posts.Post_id')
    ->where('posts.user_id',Auth::user()->id)
    ->join('order','order_detail.order_id','=','order.Order_ID')
    ->where('order_detail.id_user','!=',Auth::user()->id)
    ->where('order.Status',1)
    ->get();
    


    // ->Orderby('order_detail.updated_at','desc')->limit(1)

    $total = 0

 ?>

@foreach ($order as $item)
{{$item->Order_detail}}
    <figure class="media">
      <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm"></div>
      <figcaption class="media-body">
      <h6 class="title text-truncate">{{$item->title_post}}</h6>
        <dl class="param param-inline small">
          <dt>ส่งไปที่ไหน: @if ($item->receiving_location === NULL)
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
        <a href=""><button>ส่งแล้ว</button></a>
      </figcaption>
    </figure> 
@endforeach
