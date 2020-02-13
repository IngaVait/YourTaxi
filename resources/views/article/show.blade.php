@extends('layouts.app')

@section('content')
    <div class="container vh-85 p-3">
        <div class="row justify-content-center">
            <div class="col-md-7">
                {{--the place for article--}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between mb-3">
                        <a class="article-title"
                           href="{{ route('article.show', ['article' => $article]) }}"> {{ $article->title }}</a>
                        <span>{{ $article->created_at }}</span>
                    </div>
                    <img class="article-img rounded m-auto " src="{{ asset('/storage/uploads/articles/' . $article->image)}}" alt="">
                    <div class="card-body">
                        {{ $article->body }}
                    </div>

                    {{--    edit or delete post section        --}}
                    @if((auth()->user()->type ?? null) === 'admin')
                        <div class="card-header d-flex justify-content-around align-items-center h5">
                            <a class="btn btn-secondary" href="{{ route('article.edit', $article) }}">edit</a>
                            <form method="POST" action="/article/{{ $article->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-secondary">delete</button>
                            </form>
                        </div>
                    @endif
                </div>
                {{--end of article --}}
            </div>
            {{--    comment zone - API        --}}
            <div class="col-md-5 bg-dark rounded">
                <comments-manager :user='@json(auth()->user() ?? false)'
                                  :article="{{$article->id}}"></comments-manager>
            </div>
        </div>
        {{--    end of comment zone        --}}
    </div>
    </div>
@endsection
