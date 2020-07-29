@extends('layouts.header')
@section('styles')
<link rel="stylesheet" href="{{asset('vendor/editor.md/css/editormd.preview.min.css')}}">
@endsection
@section('content')

{{--    todo: prettify--}}
    <div class="container">
        @auth
            @if(Auth::user()->id == $article->publisherId)
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
        <div id="test-editormd-view2">
                <textarea id="append-test" style="display:none;">{!! $article->content !!}</textarea>
        </div>

        @include('modules.reply',$replies)

    </div>

@endsection
@section('scripts')
    <script src="{{asset('vendor/editor.md/lib/marked.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/prettify.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/underscore.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/sequence-diagram.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/flowchart.min.js')}}"></script>
    <script src="{{asset('vendor/editor.md/lib/jquery.flowchart.min.js')}}"></script>

    <script src="{{asset('vendor/editor.md/editormd.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var testEditormdView;

           testEditormdView = editormd.markdownToHTML("test-editormd-view2", {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });
        });
    </script>
@endsection
