@extends('layouts.app1')

@section('content')
<?php 
use App\breed_dog;

?>

<div class="w3-main" style="margin-left:200px;margin-top:50px;">
    <div class=" container">
      <div class="card-header">
        <strong class="card-title">ข้อมูลสุนัข</strong>
      </div>
      <div class="table-stats order-table ov-h">
      <div class="table-responsive">
                @if(count($Dogs) > 0)
                <table class="table table-bordered" id="dataTable" width="100%">
                  <thead>
                    <tr>
                      
                      <th>รูป</th>
                      <th>รหัสสุนัข</th>
                      <th>ชื่อสุนัข</th>
                      <th>รหัสผู้ใช้</th>
                      <th>ชื่อสายพันธุ์</th>
                      <th>รายละเอียด</th>
                      <th>ตรวจสอบ</th>
                      {{-- <th>แก้ไข</th> --}}
                      <th>ลบ</th>
                    </tr>
                  </thead>
  
        <!-- <div class=" container">
          <div class="col-lg-6">
            <div class="card-body ">
               -->
  
                  <tbody>
                    @foreach($Dogs as $Dog)
                    <tr>
                      <td><img class="img-responsive" src="/storage/public/imagecover/{{$Dog->image}}" alt="prewiew" width="120" height="80"></td>
                      <td>
                          {{ $Dog->idthedog}}
                      </td>
                      <td>{{ $Dog->namedog}}</td>
                      <td>{{ $Dog->user_id}}</td>
                      <td>
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
                        @endif</td>
                      <td>
                        <div class="container">
                          <!-- Button to Open the Modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $Dog->idthedog}}">ดู</button>
          
                          <!-- The Modal -->
                          <div class="modal" id="myModal{{ $Dog->idthedog}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
          
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">รูปภาพบัตรประจำตัวประชาชน</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
          
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <ul>
                                        <li>สายพันธุ์ :
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
                                        
                                        </li>
                                      <li>สายพันธุ์ลงทะเบียน : {{$Dog->registrationspecies}}</li>
                                      <li>รหัสไมโครชิพ: {{$Dog->nomicrochip}}</li>
                                      
                                        <li>สี :
                                            @if ($Dog->color == '1')
                                             สีขาว
                                            @elseif($Dog->color == '2')
                                            สีดำ
                                            @elseif($Dog->color == '3')
                                            นอกเหนือจากสีขาวและสีดำ
                                            @endif
                        
                                        </li>
                                        <li>เพศ :
                                            @if ($Dog->sex == '1')
                                            ตัวผู้
                                            @elseif($Dog->sex == '2')
                                            ตัวเมีย
                                            @endif
                                        </li>
                                        <li>พ่อพันธุ์ 
                                            @if ($Dog->id_father !== NULL)
                                            {{$Dog->father}}
                                            @else
                                            {{$Dog->father}}
                                            @endif
                                            </li>
                                        <li>แม่พันธุ์ :
                                                @if ($Dog->id_momher !== NULL)
                                                {{$Dog->momher}}
                                                @else
                                                {{$Dog->momher}}
                                                @endif 
                                            </li>
                                        
                                        <li>วันเกิด :{{$Dog->birthday}}</li>
                                        <li>ชื่อผู้เพาะพันธุ์ :{{$Dog->breedername}}</li>
                                        <li>เจ้าของ :{{$Dog->owner}}</li>
                                        <li>วันออกทะเบียน :{{$Dog->registrationdate}}</li>

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
                                        {{-- <li>
                                            ใบRC : @if ($Dog->imageRC == 'noimage.jpg'|| $Dog->imageCP == NULL )
                                            <span class="badge badge-pill badge-danger" >ไม่มี</span>
                                            
                                            @else
                                            <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#RC" >ดู</button >
                                                <!-- Modal -->
                                                <div class="modal fade" id="RC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                        
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <img src="/storage/public/imagedog/imageRC/{{$Dog->imageRC}}" class="d-block w-100"  alt="..."> 
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            @endif
                        
                                        </li> --}}
                        
                                    </ul>
                                </div>
          
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        @if ($Dog->Status == 1)
                      <a href="/Allowpost/{{$Dog->id}}"><button class="btn btn-primary" type="submit">อนุญาตโพส</button></a>
                        @else
                            
                        @endif
                        
                      </td>
                      {{-- <td><a href="/admin/dashboard/edit/" class="btn btn-primary">แก้ไข</a></td> --}}
                            <td>
                                <form action="/delete/dog/{{$Dog->id}}" >
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit">ลบ</button>
                                </form>
                                
                            </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
  
                {{$Dogs->links()}}
                @else
                <p>ไม่มีใครมีสุนัข</p>
                @endif
              </div>
            </div>
          </div>



@endsection