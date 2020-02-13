@extends('layouts.app')

@section('content')
    <div class="d-flex flex-lg-wrap justify-content-around">
        @if(Auth::user()->type === 'admin')
        <div class="text-center">
            <h1 class="text-grey-darkest">Admin</h1>
            <p class="uppercase tracking-wide text-sm text-grey-darkest ">Skirta tik adminnistratoriui!</p>
            <div class="d-flex flex-lg-wrap justify-content-center">
                @foreach($users as $user)
                    <user-item :user='@json($user)'></user-item>
                @endforeach
            </div>
        </div>
            @else
        <p>Jums nepriklauso to matyti</p>
            @endif
    </div>
@endsection

