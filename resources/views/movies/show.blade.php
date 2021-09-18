@extends('layouts.app')

@section('content')
<div class="container">
    <div class="shadow-lg p-3 mb-3 bg-body rounded d-flex justify-content-between align-middle"><span>{{$movie->name}}</span> <a href="{{route('movies.index')}}"><i class="bi bi-arrow-left-circle-fill" style="font-size:30px;"></i></a></div>
    <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <img src="{{$movie->poster_url}}" class="img-fluid" alt="{{$movie->name}}">
            </div>
        </div>
        <div class="col-md-8">
            @include('partials.status-alert')
            @if(count($movieTheaters))
            @foreach($movieTheaters as $key => $theater)
            <form class="form-inline needs-validation" novalidate method="post" action="{{route('book.now')}}">
                @csrf
                <input type="hidden" value="{{$movie->id}}" name="movie_id">
                <input type="hidden" value="-{{$key}}" name="key">
                <div class="shadow-lg p-3 mb-3 bg-white rounded">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="theater-id-{{$key}}" name="theater_id-{{$key}}" value="{{$theater->id}}" class="custom-control-input" required>
                        <label class="custom-control-label" for="theater-id-{{$key}}">{{$theater->name}}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="show-time-{{$key}}" name="show_time-{{$key}}" value="{{isset($theater->pivot->starts_at) ? $theater->pivot->starts_at: ''}}" class="custom-control-input" required>
                        <label class="custom-control-label" for="show-time-{{$key}}">{{ isset($theater->pivot->starts_at) ? date('h:i A', strtotime( $theater->pivot->starts_at)).'-'.date('h:i A', strtotime( $theater->pivot->ends_at)) : 'NA'}}</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <label class="sr-only" for="no-of-seats-{{$key}}">No of seats</label>
                        <input type="number" class="form-control my-1 mr-sm-2" id="no-of-seats-{{$key}}" placeholder="No of seats..." name="seats-{{$key}}" min="1" required>
                    </div>
                    <label class="sr-only" for="show-at-{{$key}}">Show Date</label>
                    <input type="date" class="form-control my-1 mr-sm-2" id="show-at-{{$key}}" placeholder="Select Show Date..." name="show_at-{{$key}}" required>
                    <button type="submit" class="btn btn-outline-primary">Book Now</button>
                </div>
            </form>
            @endforeach
            <div class="mt-4">
                {{ $movieTheaters->links() }}
            </div>
            @else
            <div class="shadow-lg p-3 mb-3 bg-white rounded">No Booking Details found for {{$movie->name}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script defer>
    (function() {
        'use strict';
        window.addEventListener('load', function() {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $(function() {
        $('.alert').alert();
    });
</script>
@endpush