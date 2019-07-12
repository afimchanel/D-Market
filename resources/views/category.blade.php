@extends('layouts.app')

    @section('content')

    

     <!-- Navigation -->
     
    
      <!-- Page Content -->
      <div class="container ">
    
        <div class="row">
    
          <div class="col-lg-3">
    
              
                  
                  <div class="list-group">
                    <p  class="list-group-item active">สายพันธุ์</p>
                      <a href="#" class="list-group-item">ชิวาวา</a>
                      <a href="#" class="list-group-item">ไซบิเรียน</a>
                      <a href="#" class="list-group-item">โกเด้น</a>
                  </div>
                  <div class="list-group">
                      
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Example select</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                    
                      
                  </div>
                  <div class="list-group">
                      
                      <label for="customRange2">ราคา</label>
                      <input type="range" class="custom-range" min="0" max="2" id="customRange2">
                  </div>
               
    
          </div>
          <!-- /.col-lg-3 -->
    
          <div class="col-lg-9 ">
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Category 1
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                          
                          <div class="container">
                            <div class="row">
                              <div class="col-md-4">
                                <span class="text-uppercase ">Category 1</span>
                                <ul class="nav flex-column">
                                
                              </ul>
                              </div>
                              
                              
                            </div>
                          </div>
                          <!--  /.container  -->               
                        </div>
                      </li>                                                         
                    </ul>
                  </div>  
                </nav>
            
    
            <div class="row ">
              @foreach ($post as $item)
              
              <div class="col-lg-4 col-md-6 mb-4 py-2">
                <div class="card h-100">
                  <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$item->imagedog}}" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="/{{$item->ID_dog}}/{{$item->Post_id}}/view/post">{{$item->title_post}} {{$item->Breed}}</a>	
                    
                    </h4>
                    <h5>ราคา : {{$item->price}}</h5>
                  <p class="card-text">{{$item->Detail_Dog}}</p>
                  </div>
                  <div class="row justify-content-end">
                      <a class="btn btn-primary" href="/create/order/{{ Auth::user()->id}}/{{ $item->ID_dog }}/{{$item->Post_id}}"
                        >Add to cart</a>
                     
                    </div>
                </div>
              </div>
              @endforeach
              
    
             

              
    
            </div>
            <!-- /.row -->
    
          </div>
          <!-- /.col-lg-9 -->
    
        </div>
        <!-- /.row -->
    
      </div>
      <!-- /.container -->
      
@endsection