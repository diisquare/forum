<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use Validator;

class ImagesController extends Controller
{
    /**
     * 针对editor.md的图片上传控制器
     *
     * @param  Request $request
     * @return Response
     */
    public function upload(Request $request)
    {

        $json = [
            'success' => 0,
            'message' => '失败原因为：未知',
            'url' => '',
        ];

        if ($request->hasFile('editormd-image-file')) {
            //
            $file = $request->file('editormd-image-file');
            $data = $request->all();
            $rules = [
                'editormd-image-file'    => 'max:5120',
            ];
            $messages = [
                'editormd-image-file.max'    => '文件过大,文件大小不得超出5MB',
            ];
            $validator = Validator::make($data, $rules, $messages);

            if ($validator->passes()) {

                $destPath = 'uploads/content/';
                $savePath = $destPath.''.date('Ymd', time());
                $ext = $file->getClientOriginalExtension();
                $check_ext = in_array($ext, ['gif', 'jpg', 'png'], true);

                if ($check_ext) {

                    if ($file->isValid()) {
                        $storage = Storage::disk('share');
                        $fileName= $storage->putFile($savePath,$file);
                        $json = array_replace($json, ['success' => 1, 'url' => $storage->url("$fileName")]);
                    } else {
                        $json = array_replace($json, ['success' => 0, 'meassge' => '失败原因为：文件校验失败']);
                    }
                } else {
                    $json = array_replace($json, ['success' => 0, 'message' => '失败原因为：文件类型不允许,请上传常规的图片（gif|jpg|png）文件']);
                }
            } else {
                $json = format_json_message($validator->messages(), $json);
            }
        }
        return response()->json($json);
    }
}
