@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/editor.md/css/editormd.min.css')}}">
@endsection



    <div id="editormd">
                        <textarea style="display:none;" id = "{{$id}}" name="{{$id}}">{!!$default!!}</textarea>
    </div>
</div>

@section('scripts')
    <script src="{{asset('vendor/editor.md/editormd.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            editormd.emoji     = {
                path  : "//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/",
                ext   : ".png"
            };

            var editor = editormd("editormd",{
                width : "100%",
                height : 640,
                path : "/vendor/editor.md/lib/",
                saveHTMLToTextarea : {{config('editor.saveHTMLToTextarea')}},
                emoji : {{config('editor.emoji')}},
                taskList : {{config('editor.taskList')}},
                tex : {{config('editor.tex')}},
                toc : {{config('editor.toc')}},
                tocm : {{config('editor.tocm')}},
                codeFold : {{config('editor.codeFold')}},
                flowChart: {{config('editor.flowChart')}},
                sequenceDiagram: {{config('editor.sequenceDiagram')}},
            });
        });
    </script>
{{--    {!! editor_config('editormd') !!}--}}
@endsection
