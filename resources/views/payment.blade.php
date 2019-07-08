@extends('layouts.app')
 
    @section('content')
 
      
    <div id="timeline-wrap">
        <div id="timeline"></div>
    
        <!-- This is the individual marker-->
        <div class="marker mfirst timeline-icon one">
            <i class="fa fa-pencil"></i>
        </div>
        <!-- / marker -->
    
        <!-- This is the individual marker-->
        <div class="marker m2 timeline-icon two">
            <i class="fa fa-usd"></i>
        </div>
        <!-- / marker -->
    
        <!-- This is the individual marker-->
        <div class="marker m3 timeline-icon three">
            <i class="fa fa-list"></i>
        </div>
        <!-- / marker -->
    
    
        <!-- This is the individual marker-->
        <div class="marker mlast timeline-icon four">
            <i class="fa fa-check"></i>
        </div>
        <!-- / marker -->
    
    
    
    </div>
    
    
    <table class="table col-md-6 container-fluid">
        <caption>ราคารวม ทั้งสิ้น</caption>
        <thead>
            <tr>
                <th scope="col"># รหัสการสั่งซ์้อ</th>
                <th scope="col">ชื่อโพส</th>
                <th scope="col">ราคา</th>
    
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
    
            </tr>
    
        </tbody>
    </table><br><br>
    
    <form>
        <div class="container">
            <form action="/action_page.php">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี</label>
                    </div>
                    <div class="col-75">
                        <input type="text" placeholder="จำนวนเงินที่เข้าที่โอนเงินเข้าบัญชี">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="country">วันที่โอนและเวลาโอนเงิน</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" name=''>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="fname">สนามบินที่ใกล้ที่สุด</label>
                    </div>
                    <div class="col-75">
                        <input type="text" placeholder="(เป็นสถานที่รับสุนัข)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">อัพโหลดหลักฐานการชำระเงิน</label>
                    </div>
                    <div class="col-75">
                        <div class="custom-file ">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">หลักฐานการชำระเงิน</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">อัพโหลดสำเนาบัตรประชาชน</label>
                    </div>
                    <div class="col-75">
                        <div class="custom-file ">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">สำเนาบัตรประชาชน</label>
                        </div>
                    </div>
                </div><br><br>
                <div style="text-align:center;">
                    <input type="submit" value="Submit">
                </div><br><br>
            </form>
        </div>
    </form>
    </div>
    
   
        
    @endsection