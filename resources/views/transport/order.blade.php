
<?php 
use App\orders;
use App\User;
use App\orderdetail;

$order = orderdetail::join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
    ->join('posts','order_detail.id_post','=','posts.Post_id')
    ->join('order','order_detail.order_id','=','order.Order_ID')
    ->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
    ->where('order.Status','>=',1)
    ->where('order.Status','<',4)
    // ->select('posts.Detail_Dog','posts.price','order_detail.*','dogs.image')
    ->get();

?>
<table class="table ">
        <thead>
          <tr>
            <th>#รหัสออเดอร์</th>
            <th>ชื่อผู้ชื้อ</th>
            <th>ชื่อผู้ขาย</th>
            <th>#รหัสสุนัข</th>
            <th>เบอร์โทรติดต่อกับผู้ชื้อ</th>
            <th>สถานที่ไปส่ง</th>
            <th>ผู้ขายมาส่งแล้ว</th>
            <th>ผู้ขื้อมารับสุนัขแล้ว</th>
            <th>ถึงไหนแล้ว</th>
          </tr>
        </thead>


        <tbody>
          @foreach($order as $item)
         
          <tr>
                <td>{{ $item->Order_ID}}</td>
                <td>
                <?php 
                    $finduser = User::find($item->id_user);

                    ?>
                    {{$finduser->	NameSurname}}
                </td>
                <td>
                    <?php 
                    $finduserseller = User::find($item->user_id);

                    ?>
                    {{$finduserseller->	NameSurname}}
                </td>
                <td>{{ $item->idthedog}}</td>
                
                <td>{{ $item->tel_Customer }}</td>
                <td>{{ $item->address }}อำเภอ :{{$item->district}} จังหวัด :{{$item->province}}</td>
                <td>
                  @if ($item->Status == 1)
                  <a class="btn btn-success" href="Payment/finish/{{$item->order_id}}/{{$item->id_post}}">มาส่งแล้ว</a>
                  @endif
                </td>
                <td>
                <!-- && $item->statusname == 'ส่งสำเร็จ' -->
                  @if ($item->Status == 3 )
                  <form method="POST" action="Payment/geted/{{$item->Order_ID}}/{{$item->id_post}}" enctype="multipart/form-data" class="needs-validation" >
                    @csrf
                    <label for="formGroup File">อัพโหลดลายเซ็นการรับสุนัข</label>
                    <input type="file" name="signature" accept=".png,.jpg,.jpeg">
                    
                    <button type="submit" class="btn btn-success">ผู้ชื้อได้รับสุนัขแล้ว</button>
                  </form>
                
                  @endif
                    
                </td>
                <td>
                  
                    @if ($item->Status == 3 )
                      <form method="POST" action="Payment/deliverystatus/{{$item->Order_ID}}">
                        @csrf 
                        เวลาที่เริ่มส่ง
                        <input type="datetime-local" name='deliverytime' >
                          <div class="form-group">
                            จังหวัดปัจจุบัน
                              <select class="form-control"  name='provincename'>
                              
                                <option value="เชียงราย">เชียงราย</option>
                                <option value="เชียงใหม่">เชียงใหม่</option>
                                <option value="น่าน">น่าน</option>
                                <option value="พะเยา">พะเยา</option>
                                <option value="แพร่">แพร่</option>
                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                                <option value="ลำปาง">ลำปาง</option>
                                <option value="ลำพูน">ลำพูน</option>
                                <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                                
                              </select>
                            </div>
                            <div class="form-group">
                            สถานะสุนัข :
                              <select class="form-control"  name='statusname'>
                              <option value="กำลังไปส่ง" >กำลังไปส่ง</option>
                                <option value="อยู่ระหว่างการส่ง">อยู่ระหว่างการส่ง</option>
                                <option value="ส่งสำเร็จ">ส่งสำเร็จ</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-success">กด</button>
                      </form>
                    @endif
                </td>
                
                </tr> 
          

          @endforeach
          
        </tbody>
      </table>