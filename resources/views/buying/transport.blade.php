
<?php 
use App\orderdetail;
use App\post;
use App\payment;
use App\User;
//$idpost = post::where('user_id',Auth::user()->id)->get('Post_id');

$order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
->join('users', 'order_detail.id_user', '=', 'users.id')
->join('posts','order_detail.id_post','=','posts.Post_id')
->where('posts.user_id','=',Auth::user()->id)
->join('order','order_detail.order_id','=','order.Order_ID')
->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
->where('order_detail.id_user','!=',Auth::user()->id)
->where('order.Status',1)

->select('posts.Detail_Dog','posts.price','posts.user_id','order_detail.*','dogs.image','order.Status')
->get();
$total = 0

?>

@foreach ($order as $item)

<figure class="media">
  <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm" style="width:250px; height:250px;"></div>
  <figcaption class="media-body">
      <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"> <h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
    <dl class="param param-inline small">
      
        @if ($item->Status == 3)
        สถานะ : ไปส่งแล้ว
       
        @elseif($item->Status == 1)
        สถานะ : รอคุณไปส่ง
        @endif
        
      <dt>ราคา:{{$item->price}}</dt>
    </dl>
        <?php 
        $findid = user::find($item->id_user);
        $findorder = payment::where('Order_ID',$item->order_id)->first();
       
                if(date("Y-m-d H:i:s",strtotime($item->updated_at."+24 hour")) <= date("Y-m-d H:i:s")){
                    $user = Auth::user();
                    $user->scoreseller = $user->scoreseller - 1 ;
                    $user->save();
                    return redirect()->back();
                }
        ?>

    <p class="text-dark m-0">ชื่อ-นามสกุลผู้ชื้อ :{{$findid->name}} </p>
    <p class="text-dark m-0">รหัสใบPaymnet {{$findorder->Pay_ID}} </p>
    <p class="text-dark m-0">หมายเลขออเดอร์: {{$findorder->Order_ID}} </p>
    <p class="text-dark m-0">ราคา: {{$findorder->price_payment}} </p>
    <p class="text-dark m-0">สถานที่ ที่ต้องไปส่ง: 
        ที่อยู่ของD-Market Transport ที่ใกล้ที่สุดภายใน24ช.ม นับจากผู้ชื้อจ่ายเงิน
    </p>
    <p class="text-dark m-0">เบอร์โทรลูกค้า: {{$findorder->tel_Customer}} </p>
    <p class="text-dark m-0">วันที่โอน: {{$findorder->Transferdate}} </p>
    
    หลักฐานการโอน
    <img src="/storage/public/image_payment/{{$findorder->image_payment}}" style="width:70px; height:70px;" class="css-class" alt="alt text">



  </figcaption>
</figure> 
@endforeach
