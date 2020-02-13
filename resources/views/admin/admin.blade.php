@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-9/10">
        <div class="text-center">
            <h1 class="text-grey-darkest text-4xl mb-6">Admin</h1>
            <p class="uppercase tracking-wide text-sm text-grey-darkest ">For admin users only!</p>
            <div class="d-flex flex-wrap justify-content-center">

                @foreach($users as $user)
                    <user-item :user='@json($user)'></user-item>
                @endforeach
            </div>
        </div>
    </div>
@endsection

