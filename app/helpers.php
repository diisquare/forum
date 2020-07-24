<?php
    function human_fileSize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
    }

/**
 * @param $lengthOfFakeString
 * @param $numOfReplies
 * @return string
 * @example 3;4;6;24
 */
    function getFakeRepliesId($lengthOfFakeString,$numOfReplies){
        $replies = "";
        $numbers = range(1,$numOfReplies);
        shuffle($numbers);
        for ($i=0;$i<$lengthOfFakeString;$i++){
            $replies= $replies."$numbers[$i]".';';
        }
        return $replies;
    }

function editor_config($editor_id = 'mdeditor')
{

    return '<!--editor.md config-->
<script type="text/javascript">
var _'.$editor_id.';
$(function() {
    //修正emoji图片错误
    editormd.emoji     = {
        path  : "//staticfile.qnssl.com/emoji-cheat-sheet/1.0.0/",
        ext   : ".png"
    };
    _'.$editor_id.' = editormd({
            id : "'.$editor_id.'",
            width : "100%",
            height : 640,
            saveHTMLToTextarea : '.config('editor.saveHTMLToTextarea').',
            emoji : '.config('editor.emoji').',
            taskList : '.config('editor.taskList').',
            tex : '.config('editor.tex').',
            toc : '.config('editor.toc').',
            tocm : '.config('editor.tocm').',
            codeFold : '.config('editor.codeFold').',
            flowChart: '.config('editor.flowChart').',
            sequenceDiagram: '.config('editor.sequenceDiagram').',
            path : "/vendor/editor.md/lib/",
            imageUpload : '.config('editor.imageUpload').',
            imageFormats : ["jpg", "gif", "png"],
            imageUploadURL : "/editor-md/upload/picture?_token='.csrf_token().'&from=laravel-editor-md"
    });
});
//TODO:imageUploader;
</script>';

}
