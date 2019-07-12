@extends('layouts.app')

    @section('content')
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
          
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            
              
             

                 <!-- PRODUCT -->
                <div class="row">
                   <div class="col-12 col-sm-12 col-md-2 text-center">
                           <img class="img-responsive" src=" " alt="prewiew" width="120" height="80">
                   </div>
                   <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                           <a href=""><h4 class="product-name"><strong>Product Name :  </strong></h4></a> 
                       <small>Description : </small>
                       </h4>
                   </div>
                   <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                       <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                           <h6><strong>ราคา :  </strong></h6>
                       </div>
                     
                       <div class="col-2 col-sm-2 col-md-2 text-right">
                           <form action="" method="POST">
                               @csrf
                               @method('DELETE')
   
                               <button type="submit" class="btn btn-outline-danger btn-xs">Delete
                                   <i class="fa fa-trash" aria-hidden="true"></i>
                               </button>
                             </form>
                          
                       </div>
                   </div>
               </div>
               <hr>
               <!-- END PRODUCT -->

             
                
            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>
        <div class="card-footer">
            
            <div class="pull-right" style="margin: 10px">
            <a href="" class="btn btn-success pull-right">
               @csrf
               ยืนยันการซื้อ</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>50.00€</b>
                </div>
            </div>
        </div>
    </div>
</div>
        
    @endsection