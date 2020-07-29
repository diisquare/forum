@extends('layouts.header')
@section('content')

    <div class="container">
        <a href="{{route('articles.create')}}">
            <button class="btn btn-primary btn-lg btn-block">新建文章</button>
        </a>
        <a href="{{route('posts.create')}}">
            <button class="btn btn-primary btn-lg btn-block" > 提问 </button>
        </a>
        <ul>
            @foreach($articles as $article)
            <li><a href="{{route('articles.show',['article'=>$article->id])}}">{{$article->title}}</a> </li>
                <em>{{$article->published_at}}</em>
            @endforeach
        </ul>
        {!! $articles->links() !!}
    </div>
@endsection
