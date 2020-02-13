@extends('layouts.app')

@section('content')
    <div class="hero-img">
    </div>
    {{--   services cards start    --}}
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-between align-items-center hero-body">
            @foreach($services as $service)
                <div class="card w-25 h-75">
                    <img class="card-img" src="{{ $service['url'] }}">
                    <div class="d-flex flex-column align-items-center">
                        <h4 class="services-title">{{ $service['job'] }}</h4>
                        <p class="services-body">{{ $service['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--   services cards end     --}}
    {{--place for map--}}
    <iframe width="100%" height="450" frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJSeEU2OeW3UYRx9TvmOGHeN0&key=AIzaSyDEkUyHQBHl6NcVR5YtVySSY9dWAHR-3ZA"
            allowfullscreen></iframe>
@endsection
