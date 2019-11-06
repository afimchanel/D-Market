@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->get('not'))
<div class="alert alert-danger">
  {{ session()->get('not') }}  
</div><br />
@endif  
<?php

use App\dogimages;
use App\dogvideo;
use App\User;
use App\Dog;
$sliders = dogimages::where(['dog_id' => $id])->get();
$video = dogvideo::where(['dog_id' => $id])->get();
?>
@foreach ($Dogs as $Dog)
<!-- Page Content -->
<div class="container">
    <!-- Portfolio Item Heading -->
    <h4 class="my-4">
        {{$Dog->namedog}}
    </h4>

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
        <!-- The slideshow -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          </ol>
          <div class="carousel-inner">
              @foreach($sliders as $key => $slider)
              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                  <img src="/storage/public/imagedog/{{$slider->image}}" class="d-block w-100"  > 
              </div>
              @endforeach
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>



        </div>

        <div class="col-md-4">
            <h3 class="my-3">รายละเอียด</h3>
            @foreach ($video as $item)
                <video width="400" controls>
                    <source src="/storage/public/videodog/{{$item->video}}" type="video/mp4">
                </video>
            @endforeach

            
            <ul>
                <li><a href="/user/{{$Dog->user_id}}">เจ้าของสุนัข</a></li>
                <li>สายพันธุ์ :<a class="badge badge-success" href="/search/{{$Dog->breed}}">
                    @if ($Dog->breed == 1)
                    ปั๊ก (Pug)
                    @elseif($Dog->breed == 2)
                    ชิวาวา(Chihuahua)
                    @elseif($Dog->breed == 3)
                    ปอมเมอเรเนียน (Pomerania)
                    @elseif($Dog->breed == 4)
                    ชิสุ (Shih Tzu)
                    @elseif($Dog->breed == 5)
                    ยอร์คเชียร์ เทอร์เรียร์ (Yorkshire Terrier)
                    @elseif($Dog->breed == 6)
                    บีเกิล (Beagle)
                    @elseif($Dog->breed == 7)
                    บูลด็อก (Bulldog)
                    @elseif($Dog->breed == 8)
                    ไซบีเรียน ฮัสกี้ (Siberian Husky)
                    @elseif($Dog->breed == 9)
                    โกลเด้น รีทรีฟเวอร์ (Golden Retriever)
                    @elseif($Dog->breed == 10)
                    ลาบราดอร์ รีทรีฟเวอร์ (Labrador Retriever)
                    @elseif($Dog->breed == 11)
                    อื่นๆ
                    @endif
                
                </a></li>

                <li>สี :
                    @if ($Dog->color == '1')
                <a href="/search/{{$Dog->color}}" class="badge badge-primary">สีขาว</a>
                    @elseif($Dog->color == '2')
                    <a href="/search/{{$Dog->color}}" class="badge badge-primary">สีดำ</a>
                    @elseif($Dog->color == '3')
                <a href="/search/{{$Dog->color}}" class="badge badge-primary">นอกเหนือจากสีขาวและสีดำ</a>
                    @endif

                </li>
                <li>เพศ :
                    @if ($Dog->sex == '1')
                <a href="/search/{{$Dog->sex}}" class="badge badge-secondary">ตัวผู้</a>
                    @elseif($Dog->sex == '2')
                <a href="/search/{{$Dog->sex}}" class="badge badge-secondary">ตัวเมีย</a>
                    @endif
                </li>
                <li>พ่อพันธุ์ 
                    @if ($Dog->id_father !== NULL)
                    <a class="badge badge-warning" href="/view/dog/breed/{{$Dog->id_father}}">{{$Dog->father}}</a>
                    @else
                    {{$Dog->father}}
                    @endif
                    </li>
                <li>แม่พันธุ์ :
                        @if ($Dog->id_momher !== NULL)
                        <a class="badge badge-warning" href="/view/dog/breed/{{$Dog->id_momher}}">{{$Dog->momher}}</a>
                        @else
                        {{$Dog->momher}}
                        @endif 
                    </li>
                <a  href="/view/dog/gene/{{$Dog->id}}">ดูสายพันของตัวนี้</a>
                <li>วันเกิด :{{$Dog->birthday}}</li>
                <li>
                    ใบCP : 
                    @if ($Dog->imageCP == 'noimage.jpg' || $Dog->imageCP == NULL)
                    <span class="badge badge-pill badge-danger">ไม่มี</span>
                    @else
                    <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#CP" >ดู</button >
                                <!-- Modal -->
                                <div class="modal fade" id="CP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
        
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                    <img src="/storage/public/imagedog/imageCP/{{$Dog->imageCP}}" class="d-block w-100"  alt="..."> 
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                    @endif
                </li>
                <li>
                    คนที่เคยเป็นเจ้าของ :
                    @foreach ($gene as $item)
                    <?php 
                    $ownnow1 = User::find($item->user_id);
                    ?>
                        <li><a href="/user/{{$item->user_id}}">{{$ownnow1->NameSurname}}</a>เวลาครอบครองครั้งสุดท้าย{{$item->updated_at}}</li>           
                    @endforeach
                    
                </li>
                <li>
                        <?php 
                        $ownnow = Dog::where('idthedog',$Dog->idthedog)->Orderby('id','DESC')->first();
                        $ownnow2 = User::find($ownnow->user_id);
                        ?>
                        @if ($ownnow->Status == 3)
                            เจ้าของปันจุบันยังไม่ได้เพิ่มสุนัขเข้าในเว็บ
                        @else
                            เจ้าของปันจุบัน : คุณ {{$ownnow2->NameSurname}}
                        @endif
                    
                   
                </li>
            </ul>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
    
@endforeach

@endsection