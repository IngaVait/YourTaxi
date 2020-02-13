@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($articles as $article)
            <div class="card">
                <div class="card-header"><a class="article-title" href="{{ route('article.show', ['article' => $article]) }}"> {{ $article->title }}</a></div>

                <div class="card-body">
                {{ $article->body }}
                </div>
            </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
