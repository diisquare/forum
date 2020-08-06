@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/editor.md/css/editormd.preview.min.css')}}">
@endsection

<div id="test-editormd-view2">
    <textarea id="append-test" style="display:none;">{!! $content !!}</textarea>
</div>

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
