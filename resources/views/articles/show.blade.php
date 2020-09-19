@extends('layouts.header')

@section('content')

{{--    todo: prettify--}}
    <div class="container">
        @auth
            @if(Auth::user()->id == $article->user_id)
        <a href="{{route('articles.edit',$article->id)}}">
            <button class="btn btn-primary btn-lg btn-block" > 修改 </button>
        </a>
        <form role="form" method="POST" action="{{route('articles.destroy',$article->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-primary btn-lg btn-block" > 删除 </button>
        </form>

            @endif
        @endauth


        <h1>{{$article->title}}</h1>
        <h2>{{$user->name}}</h2>
            @include('modules.mdViewer',['content'=>$article->content])
            @include('modules.reply.reply',['replies'=>$replies,'topic'=>$article,'topicType'=>1])

    </div>

@endsection

