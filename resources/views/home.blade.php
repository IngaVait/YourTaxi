@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <user-profile :user='@json(auth()->user() ?? false)'></user-profile>
                </div>
            </div>
        </div>
    </div>
@endsection
