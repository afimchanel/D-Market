
<?php 
use App\orderdetail;
use App\User;
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
    <?php 
      $ownnow1 = User::find($item->user_id);
    ?>
    ผู้ขาย : <a href="/user/{{$item->user_id}}">{{$ownnow1->NameSurname}}</a> 
    สายพันธุ์ :<a class="badge badge-success" href="/search/{{$item->breed}}">
              @if ($item->breed == 1)
              ปั๊ก (Pug)
              @elseif($item->breed == 2)
              ชิวาวา(Chihuahua)
              @elseif($item->breed == 3)
              ปอมเมอเรเนียน (Pomerania)
              @elseif($item->breed == 4)
              ชิสุ (Shih Tzu)
              @elseif($item->breed == 5)
              ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)
              @elseif($item->breed == 6)
              บีเกิล (Beagle)
              @elseif($item->breed == 7)
              บูลด็อก (Bulldog)
              @elseif($item->breed == 8)
              ไซบีเรียน ฮัสกี้ (Siberian Husky)
              @elseif($item->breed == 9)
              โกลเด้น รีทรีฟเวอร์ (Golden Retriever)
              @elseif($item->breed == 10)
              ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)
              @elseif($item->breed == 11)
              อื่นๆ
              @endif
            </a>
            <p class="text-dark m-0">ชื่อ ฟาร์ม : {{$item->farm_name}} </p>
            <p class="text-dark m-0">เพศ :
              @if ($item->sex == '1')
              ตัวผู้
              @elseif($item->sex == '2')
              ตัวเมีย
              @endif 
            </p>
            <p class="text-dark m-0">น้ำหนัก :
                @if ($item->weight_dog == 1)
                น้อยกว่า10กิโล
                @elseif ($item->weight_dog == 2)
                11กิโล-15กิโล
                @elseif ($item->weight_dog == 3)
                16กิโล-20กิโล
                @elseif ($item->weight_dog == 4)
                มากกว่า20กิโล
                @endif
            </p>
            <p class="text-dark m-0">สีสุนัข :
              @if ($item->color = 1)
                สีขาว
              @elseif ($item->color = 2)
                สีดำ
              @elseif ($item->color = 3)
              นอกจากสีขาวและสีดำ
              @endif
            
            </p>

            <p class="text-dark m-0">วันที่เกิด : {{$item->birthday}} </p>
            <p class="text-dark m-0">ผู้เพาะพันธุ์ : {{$item->owner}} </p>
            <p class="text-dark m-0">พ่อพันธุ์ : {{$item->father}} </p>
            <p class="text-dark m-0">แม่พันธุ์ : {{$item->momher}} </p>
    <dt>ราคา: {{$item->price}}</dt>
          
    @if ($item->Status == 3)
    สถานะ : ไปส่งแล้ว ณ เวลา {{$item->updated_at}}
   
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
