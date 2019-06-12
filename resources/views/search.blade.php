@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:100px">
        <div class="row">
            <div class="col-sm-3">
                <!-- Actual search box -->
                <div class="form-group has-search">
                    <input type="text" class="form-control" placeholder="ค้นหา">
                </div>
                <br>

                <label for="customRange1">เรทราคา</label>
                <input type="range" class="custom-range" id="customRange1"> 
                 <br><br>

                <label for="sel1">ราคาเริ่มต้น</label>
                    <select class="form-control" id="sel1" name="sellist1">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select><br>

                    <label for="sel1">ราคาสูงสุด</label>
                        <select class="form-control" id="sel1" name="sellist1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select><br>

                        <button type="button" class="btn btn-warning">ตกลง</button>
                        <br><br>

                        <label for="sel1">พื้นที่</label>
                            <select class="form-control" id="sel1" name="sellist1">
                                <option>แพร่</option>
                                <option>เชียงใหม่</option>
                                <option>น่าน</option>
                                <option>พะเยา</option>
                            </select>

            </div>

            <div class="col-sm-8">
                <h2>รายละเอียดสุนัข</h2>

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="/image/Cihuahua1.jpg" alt="First slide" >
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/image/golden.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/image/pug.jpg" alt="Third slide">
                        </div>
                    </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
  
                    <div class="row">
    
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item One</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="som4">Item Two</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text"></p>
                                </div>
                    
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="som4">Item Three</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text"></p>
                                </div>
                            
                            </div>
                        </div>
            
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="som4">Item Four</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text"></p>
                                </div>
                            
                            </div>
                        </div>
            
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="som4">Item Five</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="som4">Item Six</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Seven</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Eigth</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Nigth</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Ten</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Eleven</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Item Twelve</a>
                                    </h4>
                                    <h5>รายละเอียดสุนัข</h5>
                                    <p class="card-text">ราคา</p>
                                </div>
                    
                            </div>
                        </div>
    
                    </div>
                    <!--จบ /.row -->
        
                </div>
            </div>

        </div><br><br><br>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <p>Footer</p>
    </div>

@endsection