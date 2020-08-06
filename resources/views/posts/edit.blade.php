@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">添加内容</h4>
            <form role="form" method="POST" action="{{route('posts.update',$post->id)}}">
                @csrf
                <div class="row">
                    <input id="publisherId" name="publisherId" type="hidden" value="{{$post->publisherId}}">
                    <div class="col-md-6 mb-3">
                        <label for="topic">发表类型</label>
                        <select class="custom-select d-block w-100" id="topic"  name="topic_type">
                            <option value="0">Post</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a topic type.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sid">发表分区</label>
                        <select class="custom-select d-block w-100" id="sid"  name="sid" value="{{$post->sid}}">
                            @foreach($sections as $section)
                                <option value="{{$section->id}}">{{$section->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a section.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title">标题</label>
                        <input type="text" class="form-control" id="title"  name="title" value="{{$post->title}}">
                        <div class="invalid-feedback">
                            A title is required;
                        </div>
                    </div>
                </div>
                <div  class="row">
                    <label for="content">内容</label>
                    @include('modules.editor',['default'=>$post->content,'id'=>'content'])
                </div>
                <hr class="mb-4">
                <div class="col-md-2">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">发表</button>
                </div>
            </form>
        </div>
    </div>
@endsection

