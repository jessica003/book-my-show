@extends('layouts.app')

@section('content')
@if(count($movies))
<div class="container">
    <div class="shadow-lg p-3 bg-body rounded text-center sticky-top">{{__('Movies')}}</div>
    @foreach($movies->chunk(3) as $key => $items)
    <div class="row">
        @foreach($items as $key => $movie)
        <div class="col-6 col-md-4">
            <div class="mt-4 shadow-lg bg-body rounded">
                <img src="{{$movie->poster_url}}" class="card-img-top" alt="{{$movie->poster_url}}">
                <div class="card-body">
                    <p class="card-text">{{$movie->name}} </p>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('movies.show', $movie->id)}}">{{__('Book Tickets')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    <div class="mt-4">
        {{ $movies->links() }}
    </div>
</div>
@else

@endif
@endsection