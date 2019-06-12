@extends('layouts.app1')

@section('content')

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class=" container">
        <div class="card mb-2">
          
          <div class="card-body ">
            <div class="table-responsive">
              @if(count($Dogs) > 0)
              <table class="table table-bordered" id="dataTable" width="100%" >
                <thead>
                  <tr>
                    <th>ID_dog</th>
                    <th>IDthedog</th>
                    <th>user_id(เป็นของคนไหน)</th>
                    <th>Breed</th>
                    <th>Registrationspecies</th>
                    <th>Nomicrochip</th>
                    <th>color</th>
                    <th>SEX</th>
                    <th>Father</th>
                    <th>Momher</th>
                    <th>birthday</th>
                    <th>Breedername</th>
                    <th>Owner</th>
                    <th>Registrationdate</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>
                  
                    @foreach($Dogs as $Dog)
                      <tr>
                          <td>{{ $Dog->ID_dog }}</td>
                          <td>{{ $Dog->IDthedog }}</td>
                          <td>{{ $Dog->user_id}}</td>
                          <td>{{ $Dog->Breed}}</td>
                          <td>{{ $Dog->Registrationspecies}}</td>
                          <td>{{ $Dog->Nomicrochip}}</td>
                          <td>{{ $Dog->color}}</td>
                          <td>{{ $Dog->SEX}}</td>
                          <td>{{ $Dog->Father}}</td>
                          <td>{{ $Dog->Momher}}</td>
                          <td>{{ $Dog->birthday}}</td>
                          <td>{{ $Dog->Breedername}}</td>
                          <td>{{ $Dog->Owner}}</td>
                          <td>{{ $Dog->Registrationdate}}</td>
                          <td>{{ $Dog->Status}}</td>
                        <!--<td><a href="/admin/dashboard/edit/" class="btn btn-primary">Edit</a></td>
                          <td>
                              <form action="/admin/dashboard/edit//destroy" method="post">
                                @csrf
                                
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                              
                          </td>-->
                          
                      </tr>
                    @endforeach
                    
                </tbody>
              </table>
              ***หมายเหตุ สถานะ 0 เป็นสุนัขที่ยังไม่แสดงให้ใครเห็น, 1 โพสให้คนอื่นเห็น , 2 อยู่ระหว่างรอโอนเงิน ,3 รอส่งสุนัข ,4 ขายเสร็จแล้ว
              @else
              <p>ไม่มีใครมีสุนัข</p>
          @endif
            </div>
          </div>
        </div>  
      </div>  
@endsection