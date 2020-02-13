@extends('layouts.app')

@section('content')
<div class="container vh-100 p-5">
    <div class="d-flex flex-column align-items-center justify-content-center w-100">

            @foreach($articles as $article)
            <div class="card w-100">
                <a class="article-title mt-2 ml-3" href="{{ route('article.show', ['article' => $article]) }}"> {{ $article->title }}</a>
                <p class="card-body">{{ $article->body }}</p>
            </div>
                @endforeach
    </div>
</div>
@endsection
