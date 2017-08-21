@extends('layouts.app')

@section('content')
    <h1>Pets</h1>
    @if (count($pets) > 0)
        @foreach($pets as $pet)
        
            <div class = "col-sm-6 col-md-3">
                <div class = "thumbnail">
                    <a href="/pets/{{$pet->id}}"><img src="/storage/pet_images/{{$pet->pet_image}}" alt="" style="max-height:250px max-width:500px" class="img-rounded">
            
            
                    <div class = "caption">
                        <h4 class="card-title"><a href="/pets/{{$pet->id}}">{{$pet->name}}</a></h4>
                        <h5 class="card-text">Type :{{$pet->type}}</h5>
                        <h5 class="card-text">Color:{{$pet->color}}</h5>
                        <h5 class="card-text">Owner: {{$pet->user->name}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        {{$pets->links()}}
    @else
        <p class="label label-warning">No pets found</p>
    @endif
@endsection



  