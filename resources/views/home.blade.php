@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row" style="margin-top:20px;">
    @foreach($sections as $section)
        <div class="col-md-3">
            <a class="thumb panel panel-default thumb-icon-a" href="{{ route('section.index',['title'=>$section->title]) }}">
                <div class="panel-body" style="display: block;">
                    <h4>{{$section->title}}</h4>
                    {{$section->description}}
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
