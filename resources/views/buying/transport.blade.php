
<?php 
    use App\orderdetail;
    use App\orders;
    $x = orderdetail::where('id_user',Auth::user()->id); //ต้องหาidคนมาชื้ให้ได้เอามาwhere orderid 
    $orderid = orders::where('id_user',3)
    ->where('Status',1)
    ->Orderby('updated_at','desc')->first();

    $order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
    ->join('users', 'order_detail.id_user', '=', 'users.id')
    ->join('posts','order_detail.id_post','=','posts.Post_id')
    ->join('order','order_detail.order_id','=','order.Order_ID')
    ->where('posts.user_id',Auth::user()->id)
    ->where('order_detail.id_post',16)
    ->Where('order_detail.order_id','!=',NULL)
    ->where('order_detail.order_id',200) //9ต้องมาเเก้น่าจา
    ->get();
    


    // ->Orderby('order_detail.updated_at','desc')->limit(1)

    $total = 0

 ?>

@foreach ($order as $item)

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
        
      </figcaption>
    </figure> 
@endforeach
