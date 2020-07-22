@extends('layouts.header')
@section('content')
    <div class="container">
        <h1>{{$user->id}}   {{$user->name}}</h1>
        <h2>{{$details->isBanned}}</h2>
        <p>{{$details->slogan}}</p>
    </div>
@endsection
