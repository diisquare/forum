@extends('layouts.header')
@section('content')
    <div class="container">
        <h1>{{$user->id}}   {{$user->name}}</h1>
        <h2>{{$details->isBanned}}</h2>
        <p>{{$details->slogan}}</p>
        <h1>文章</h1>
        <ul>
            @foreach($articles as $article)
                <li>{{$article->title}} </li>
                <em>{{$article->published_at}}</em>
            @endforeach
        </ul>
        <h1>提问</h1>
        <ul>
            @foreach($posts as $post)
                <li>{{$post->title}} </li>
                <em>{{$post->published_at}}</em>
            @endforeach
        </ul>
        <h1>回复</h1>
        <ul>
            @foreach($replies as $reply)
                <li>{{$reply->content}} </li>
                <em>{{$reply->published_at}}</em>
            @endforeach
        </ul>
    </div>
@endsection
