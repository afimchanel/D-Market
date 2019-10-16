
<?php 
    use App\orderdetail;
    use App\post;
    use App\payment;
    use App\User;
    //$idpost = post::where('user_id',Auth::user()->id)->get('Post_id');

    $order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
    ->join('users', 'order_detail.id_user', '=', 'users.id')
    ->join('posts','order_detail.id_post','=','posts.Post_id')
    ->where('posts.user_id',Auth::user()->id)
    ->join('order','order_detail.order_id','=','order.Order_ID')
    ->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
    ->where('order_detail.id_user','!=',Auth::user()->id)
    ->where('order.Status',1)
    ->select('posts.Detail_Dog','posts.price','order_detail.*','dogs.image')
    ->get();
    


    // ->Orderby('order_detail.updated_at','desc')->limit(1)

    $total = 0

 ?>

@foreach ($order as $item)

{{$item->Order_detail}}
    <figure class="media">
      <div class="img-wrap"><img src="/storage/public/imagecover/{{$item->image}}" class="img-thumbnail img-sm"></div>
      <figcaption class="media-body">
          <a href="/{{$item->id_the_dog}}/{{$item->id_post}}/view/post"> <h6 class="title text-truncate">{{$item->Detail_Dog}}</h6></a>
        <dl class="param param-inline small">
          
          @if (date("Y-m-d H:i:s") >= date("Y-m-d H:i:s",strtotime($item->created_at.'+ 4hour')))
          <?php  
                $score1 = Auth::user();
                $score1->score = $score1->score - 1;
                $score1->save();
          ?>
          @endif 
          <dt>ราคา:{{$item->price}}  </dt>
        </dl>
        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
          <dl class="param param-inline small">
            <?php 
            $findid = user::find($item->id_user);
            $findorder = payment::where('Order_ID',$item->order_id)->first();
           
                    if(date("Y-m-d H:i:s",strtotime($item->updated_at."+24 hour")) <= date("Y-m-d H:i:s")){
                        
                        $delete = orders::find($item->Order_ID);
                        $delete->delete();
                        $delete1 = orderdetail::where('order_id',$item->Order_ID)->get();
                        foreach ($delete1 as $item1) {
                            $item1->delete();
                        }
                        $user = Auth::user();
                        $user->score = $user->score - 1 ;
                        $user->save();
                        return redirect()->back();
                    }

            ?>
            
            
          </dl>
        </div>
        <form method="POST" action="Payment/finish/{{$item->order_id}}/{{$item->id_post}}" enctype="multipart/form-data" class="needs-validation" >
          @csrf
          <label for="formGroup File">อัพโหลดหลักฐานการส่ง</label>
          <input type="file" name="deliveryreceipt" accept=".png,.jpg,.jpeg">
            @if ($findorder->receiving_location != NUll)
              สนามบิน{{$findorder->receiving_location}} 
            <input type="text" class="form-control" name="description" placeholder="กรอกรายละเอียด ไฟต์การส่งเวลาไหน ส่งไหนจากที่ไปที่{{$findorder->receiving_location}} "  required>
            @elseif($findorder->pickyourown != NULL)
              มารับเอง
              <input type="text" class="form-control"  name="description" value="มารับเอง" required>
            @elseif($findorder->address != NULL)
              ที่อยู่{{$findorder->address}}
              <input type="text" class="form-control"  name="description" placeholder="เวลาออกรถเวลาคาดว่าจะถึงหน่วยเป็น H:M " required>
            @endif
          <button type="submit" class="btn btn-primary">ตกลง</button>
        </form>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeShoes{{$item->Order_detail}}">
          <dd>ดูข้อมูลการชื้อ</dd>
          </button>
          
            <!-- The modal -->
            <div class="modal fade" id="largeShoes{{$item->Order_detail}}" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
              
              <div class="modal-header">
              <h4 class="modal-title" id="modalLabelLarge">รายละเอียดข้อมูล</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
              
              <p class="text-dark m-0">ชื่อ-นามสกุลผู้ชื้อ :{{$findid->name}} </p>
              <p class="text-dark m-0">รหัสใบPaymnet {{$findorder->Pay_ID}} </p>
              <p class="text-dark m-0">หมายเลขออเดอร์: {{$findorder->Order_ID}} </p>
              <p class="text-dark m-0">ราคา: {{$findorder->price_payment}} </p>
              <p class="text-dark m-0">สถานที่ ที่ต้องไปส่ง: 
                @if ($findorder->receiving_location != NUll)
                 สนามบิน{{$findorder->receiving_location}}
                @elseif($findorder->pick_your_own != NULL)
                  จะมารับเอง
                @elseif($findorder->address != NULL)
                  ที่อยู่{{$findorder->address}}
                @endif
                
              </p>
              <p class="text-dark m-0">เบอร์โทรลูกค้า: {{$findorder->tel_Customer}} </p>
              <p class="text-dark m-0">วันที่โอน: {{$findorder->Transferdate}} </p>
              
              หลักฐานการโอน
              <img src="/storage/public/image_payment/{{$findorder->image_payment}}" style="width:70px; height:70px;" class="css-class" alt="alt text">
              รูปบัตร ปชช
              <img src="/storage/public/image_payment_IDcardnumber/{{$findorder->image_payment_IDcardnumber}}" style="width:70px; height:70px;" class="css-class" alt="alt text">

              </div>
              </div>
            </div>

      </figcaption>
    </figure> 
@endforeach
