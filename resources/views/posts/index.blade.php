@extends('modules.header')
@section('content')
    <div class="container">
        <h1>{{$post['title']}}</h1>
        <h2>{{$user['name']}}</h2>
        <p>{{$post['content']}}</p>
{{--        TODO: 应该有一个独立的blade--}}
        <ul>
            @foreach($replies as $reply)
                <li>{{$reply['content']}} </li>
                <em>{{$reply['published_at']}}</em>
            @endforeach
        </ul>
        {!! $replies->render() !!}
    </div>
@endsection
