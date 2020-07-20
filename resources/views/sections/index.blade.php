@extends('modules.header')
@section('content')
    <div class="container">
        <ul>
            @foreach($articles as $article)
                <em>{{$article['published_at']}}</em>
{{--            <li><a href="{{route('articles.index',['id'=>$article['id']])}}">{{$article['title']}}</a> </li>--}}
{{--                <em>{{$articel['published_at']}}</em>--}}
            @endforeach
        </ul>
    </div>
@endsection
