@extends('layouts.header')
@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <h2>{{$user->name}}</h2>
        <p>{{$article->content}}</p>
        <ul>
            @foreach($replies as $reply)
                <li>{{$reply->content}} </li>
                <em>{{$reply->published_at}}</em>
            @endforeach
        </ul>
        {!! $replies->render() !!}
    </div>
@endsection
