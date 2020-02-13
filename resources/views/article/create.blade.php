@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container h-100 ">
                    @auth
                        <form class="card w-75 h-100 d-flex flex-column justify-content-around" method="post"
                              action="/article" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <label class="col" for="title">Įveskite straipsnio pavadinimą</label>
                                <input class="col" name="title" type="text" value="{{ old('title') }}">
                                @error('title')
                                <p class="alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label class="col" for="body">Jūsų straipsnis:</label>
                                <textarea class="col" rows="8" name="body">{{ old('body') }} </textarea>
                                @error('body')
                                <p class="alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="card-body">
                                <label class="col" for="body">Pridėkite nuotrauką:</label>
                                <input type="file" name="image">
                                @error('image')
                                <p class="alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-header">
                                <button class="button" type="submit">Įrašyti</button>
                            </div>
                        </form>

                    @else
                        <h3>You need to be logged in to create a Post.</h3>
                    @endauth

                </div>
            </div>
        </div>
    </div>
@endsection
