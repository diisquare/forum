@extends('layouts.header')
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/editor.md/css/editormd.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">添加内容</h4>
            <form role="form" method="POST" action="{{route('articles.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="topic_type">发表类型</label>
                        <select class="custom-select d-block w-100" id="topic_type"  name="topic_type">
                            <option value="2">Article</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a topic type.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title">标题</label>
                        <input type="text" class="form-control" id="title"  name="title">
                        <div class="invalid-feedback">
                            A title is required;
                        </div>
                    </div>
                </div>
                <div>
                    <label for="content">内容</label>
                    <div id="editormd">
                        <textarea style="display:none;" id = "content" name="content">
                        ### 关于 Editor.md
                        **Editor.md** 是一款开源的、可嵌入的 Markdown 在线编辑器（组件），基于 CodeMirror、jQuery 和 Marked 构建。
                        </textarea>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="col-md-2">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">发表</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('vendor/editor.md/editormd.min.js')}}"></script>

    {!! editor_config('editormd') !!}
@endsection
