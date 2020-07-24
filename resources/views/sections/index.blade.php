@extends('layouts.header')
@section('content')
    <div class="container">
        <ul>
            @foreach($articles as $article)
            <li><a href="{{route('articles.show',['article'=>$article->id])}}">{{$article->title}}</a> </li>
                <em>{{$article->published_at}}</em>
            @endforeach
        </ul>
        {!! $articles->links() !!}
    </div>
@endsection
