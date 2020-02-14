@extends('layouts.app')

@section('content')
    <div class="container vh-100 p-5">
        <div class="d-flex flex-column align-items-center justify-content-center w-100">
            @foreach($articles as $article)
                <div class="card w-100">
                    <span class="mt-2 ml-3">Susipažinkite ir palikite atsiliepimą: <a class="article-title "
                                                                                      href="{{ route('article.show', ['article' => $article]) }}"> {{ $article->title }}</a></span>
                    <p class="mt-1 ml-3">{{ $article->body }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
