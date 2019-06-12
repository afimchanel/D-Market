@extends('master')
@section('content')

        <form method="post" action="{{ route('dogs.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">DOGS Name:</label>
                <input type="text" class="form-control" name="dog_name"/>
            </div>

            <div class="form-group">
                <label for="quantity">DOGS Price :</label>
                <input type="text" class="form-control" name="dog_price"/>
            </div>

            <button type="submit" class="btn btn-primary">Create Dog</button>
            
        </form>


@endsection