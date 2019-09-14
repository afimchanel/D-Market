@extends('layouts.app')

@section('content')

<div class="container">
    
    @if(isset($details))
    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    
    <!-- row-->
    <div class="row">
        @foreach($details as $Dog)
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="/{{$Dog->ID_dog}}/{{$Dog->Post_id}}/view/post"><img class="card-img-top" src="/storage/public/imagedog/cover_images/{{$Dog->imagedog}}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{$Dog->Breed}}{{$Dog->title_post}}</a>
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