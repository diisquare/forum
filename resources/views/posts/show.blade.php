@extends('layouts.header')

@section('content')

    {{--    todo: prettify--}}
    <div class="container">
        @auth
            @if(Auth::user()->id == $post->publisherId)
                <a href="{{route('posts.edit',$post->id)}}">
                    <button class="btn btn-primary btn-lg btn-block" > 修改 </button>
                </a>
                <form role="form" method="POST" action="{{route('posts.destroy',$post->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" > 删除 </button>
                </form>

            @endif
        @endauth


        <h1>{{$post->title}}</h1>
        <h2>{{$user->name}}</h2>
        @include('modules.mdViewer',['content'=>$post->content])
        @include('modules.reply.reply',['replies'=>$replies,'topic'=>$post,'topicType'=>0])
    </div>

@endsection
