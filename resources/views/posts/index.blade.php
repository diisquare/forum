@extends('layouts.header')
@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <h2>{{$user->name}}</h2>
        <p>{{$post->content}}</p>
{{--        TODO: 应该有一个独立的blade--}}
@include('modules.reply',$replies)
    </div>
@endsection
