@extends('layouts.app')

@section('content')

<?php 
$total = 0;
$transportation = 0;
$t = 590;
?>

<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="/view/category" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">


            @foreach ($Order as $item)

            <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="/storage/public/imagecover/{{$item->image}}" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <a href="/{{$item->id}}/{{$item->Post_id}}/view/post">
                        <h4 class="product-name"><strong>ชื่อสุนัข : {{$item->namedog}}</strong></h4>
                    </a>
                    <small>คำบรรยาย : {{$item->Detail_Dog}} </small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>ราคา :  {{$item->price}} </strong></h6> 
                        น้ำหนัก :  
                            @if ($item->weight_dog == 1)
                            1-5กิโล ราคา 800บาท <?php    $transportation = 800; ?>
                            @elseif($item->weight_dog == 2)
                            5-10กิโล ราคา 800บาท <?php   $transportation = 800;?>
                            @elseif($item->weight_dog == 3)
                            มากกว่า10กิโล ราคา 1000บาท <?php   $transportation = 1000; ?>
                            @endif  
                            <Br>
                            ค่า บล็อค : 
                            @if ($item->type_dog == 1)
                            ไซน์ M ราคา 590 <?php    $t = 590; ?>
                            @elseif($item->type_dog == 2)
                            ไซน์ L ราคา1300 <?php   $t= 1300;?>

                            @endif

                        <?php 
                           
                            $total = $total + $item->price + $transportation +  $t
                        ?>
                    </div>

                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <form action="{{ route('order.destroy',$item->Order_detail) }}" method="POST">
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

            @endforeach

            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>
        <div class="card-footer">

            <div class="pull-right" style="margin: 10px">
                <a href="/orders/{{Auth::user()->id}}" class="btn btn-success pull-right">
                    @csrf
                    ยืนยันการซื้อ</a>
                <div class="pull-right" style="margin: 5px">
                ราคาทั้งหมด: <b>{{$total}}</b>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection