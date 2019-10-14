@extends('layouts.app')

@section('content')

<div class="container">

    @if(isset($details))
    
    <p> ผลลัพของ <b> {{ $query }} </b></p>

    <!-- row-->
    <div class="row">
        @foreach($details as $Dog)
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/{{$Dog->id_the_dog}}/{{$Dog->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagecover/{{$Dog->image}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/{{$Dog->id_the_dog}}/{{$Dog->Post_id}}/view/post">{{$Dog->Detail_Dog}}</a>
                    </h4>
                    <p class="card-text">{{$Dog->Detail_Dog}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- row-->

    {{$details->links()}}
    @endif


</div>


@endsection