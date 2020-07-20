@extends('modules.header')
@section('content')
    <div class="container">
        <h1>{{$article['title']}}</h1>
        <h2>{{$user['name']}}</h2>
        <p>{{$article['content']}}</p>
    </div>
@endsection
