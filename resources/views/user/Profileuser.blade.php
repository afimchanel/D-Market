@extends('layouts.app')
<style>
/*#region Organizational Chart*/
.tree * {
    margin: 0; padding: 0;
}

.tree ul {
    padding-top: 20px; position: relative;

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 2px solid #696969;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 2px solid #696969;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
    border-right: 2px solid #696969;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 2px solid #696969;
    width: 0; height: 20px;
}

.tree li a{
    height: 100px;
    width: 200px;
    padding: 5px 10px;
    text-decoration: none;
    background-color: white;
    color: #8b8b8b;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;  
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
    background: #cbcbcb; color: #000;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
    border-color:  #94a0b4;
}
/*#endregion*/
</style>
    @section('content')


    <!-- ด้านบนหน้าร้าน -->
   
        <div class="jumbotron jumbotron-fluid " >
               

                <div class="container ">
                    
                    <div class="container">
                
                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0 display-4 ">โปรไฟล์  {{ $users->name }} 
                        </h1>
                
                            <hr class="mt-2 mb-5">

                            <div class="row text-center text-lg-left">
                                    
                            <div class="col-sm-3">          
                                <img class="img-fluid img-thumbnail" src="/storage/avatars/{{$users->Avatar}}" style="width:300px; height:250px;"> 
                            </div> 

                        <div class="" >
                            E_mail :    {{ $users->email }}   <br>
                            ชื่อ-นาสกุล :  {{ $users->name }}  <br>
                            เบอร์โทรศัพท์ : {{ $users->Tel }} <br>
                            วันเดือนปีเกิด : {{ $users->DateofBirth }} <br>
                            @if ($users->license = 'noimage.jpg'	)
                            ใบทะเบียนจากสมาคม : สถานะ ไม่มี <br>
                            @else
                            ใบทะเบียนจากสมาคม : สถานะ มี <br>
                            @endif
                            
                            
                            ที่อยู่: {{ $users->address }}
                            
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
    <header class="bg-warning
    text-center py-5 md-4">
        <div class="container bg-warning">
          <h1 class="font-weight-light text-white ">ข้อมูล ของคุณ</h1>
        </div>
        
      </header>
      <div class="container py-5 md-4">
          

          <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">โพสทั้งหมดของคุณ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false" >สุนัขทั้งหมด</a>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " id="pills-profile-dog-tab" data-toggle="pill" href="#pills-profile-dog" role="tab"
                  aria-controls="pills-profile-dog" aria-selected="false" >ทั้งหมดสายพันธุ์</a>

              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  
                      <!-- Page Content -->
                      <div class="container">
                              
                                 <!-- Sidebar -->

                                 
                                <!-- Team Member 1 -->
                                <div class="row">
                               @foreach ($posts as $item)
                               
                                <div class="px-4 ">
                                  <div class="card h-100">
                                  <a href="/{{$item->id_the_dog}}/{{$item->Post_id}}/view/post">
                                    
                                    <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:250px; height:250px;">
                                  
                                  </a>
                                    <div class="card-body text-center">
                                      <h4 class="card-title ">
                                      <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">{{$item->title_post}}</a>
                                      </h4>
                                      <p class="card-text">{{$item->Detail_Dog}}</p>
                                    </div>
                                  </div>
                                </div>
                              
                               @endforeach
                              </div>
                      </div>
                            <!-- /.container -->
                            
              </div>
              
              
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                          <!-- Related Projects Row -->
                        

                        <div class="container">
                          
                          <!-- Page Features -->
                          
                          <div class="row text-center">

                          

                            @foreach ($Dogs as $item) 
                                    
                                
                              
                                <div class="col-lg-3 col-md-6 mb-4 ">
                                    <div class="card h-100">
                                      

                                      <img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}"style="width:250px; height:250px;">
                                    
                                      
                                      <div class="card-body">
                                      <h4 class="card-title">{{$item->Breed}}</h4>
                                      
                                      <!--<p class="card-text"></p>-->
                                      </div>
                                      <div class="card-footer">
                                      <a href="/view/dog/{{$item->ID_dog}}" class="btn btn-light" >ดูรายละเอียด</a>
                                              @if ($item->user->id == auth()->user()->id)
                                                  
                                              
                                        
                                                <a href="/edit/dog/{{$item->ID_dog}}" class="btn btn-light">เเก้ไข</a>
                                                
                                                <a href="/post/dog/{{$item->ID_dog}}" class="btn btn-success" >
                                            {{ __('โพสขาย') }}
                                                </a>
                                                <form action="{{ route('dog.destroy',$item->ID_dog) }}" method="GET">
                                                  @csrf
                                                  @method('DELETE')
                      
                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                          
      
      
      
                                            
                                                  
                                              @endif
                                            </div>
                                   
                                    </div>
                                  </div>
                                  
                                  


                                
                                  

                                @endforeach 
                                
                          
                          </div>
                          <!-- /.row -->
                         
                        </div>
                        
                            
                    
                      </div>
                     <!-- tree -->
                        <div class="tab-pane fade " id="pills-profile-dog" role="tabpanel" aria-labelledby="pills-profile-dog-tab">


                            <div class="container-fluid" style="margin-top:20px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tree">
                                            <ul>
                                                <li>
                                                    <a href="#">
                            
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                Top level
                                                            </div>
                                                            <div class="row" style="margin-top: 35px;">
                                                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                                            </div>
                                                            <div class="row">
                                                                15 Failed Tests
                                                            </div>
                                                        </div>
                            
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                            
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        Customer
                                                                    </div>
                                                                    <div class="row" style="margin-top: 35px;">
                                                                        <i class="fa fa-exclamation-circle fa-2x"></i>
                                                                    </div>
                                                                    <div class="row">
                                                                        3 Failed Tests
                                                                    </div>
                                                                </div>
                            
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                            
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        Payments
                                                                    </div>
                                                                    <div class="row" style="margin-top: 35px;">
                                                                        <i class="fa fa-exclamation-circle fa-2x"></i>
                                                                    </div>
                                                                    <div class="row">
                                                                        5 Failed Tests
                                                                    </div>
                                                                </div>
                            
                                                            </a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">
                            
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                Send Money
                                                                            </div>
                                                                            <div class="row" style="margin-top: 35px;">
                                                                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                                                            </div>
                                                                            <div class="row">
                                                                                3 Failed Tests
                                                                            </div>
                                                                        </div>
                            
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                            
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                Send Request
                                                                            </div>
                                                                            <div class="row" style="margin-top: 35px;">
                                                                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                                                            </div>
                                                                            <div class="row">
                                                                                2 Failed Tests
                                                                            </div>
                                                                        </div>
                            
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                            
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        Online
                                                                    </div>
                                                                    <div class="row" style="margin-top: 35px;">
                                                                        <i class="fa fa-exclamation-circle fa-inv fa-2x"></i>
                                                                    </div>
                                                                    <div class="row">
                                                                        7 Failed Tests
                                                                    </div>
                                                                </div>
                            
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        
                          
                                
                          </div>
                          <!-- tree -->
                  </div>
                  <!-- /.container -->  
                      
              </div>

        
    
@endsection
