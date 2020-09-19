<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyCreateRequest;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    protected $fields = [
        'fatherId'=>'',
        'atId'=>'',
        'content' => '',
        'topic'=>'',
        'topicId' => '',
        'user_id'=>'',
        'published_at'=>''
    ];

    public function __construct()
    {
        $this->middleware('auth.check')->only('store');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ReplyCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReplyCreateRequest $request)
    {
        $reply = new Reply();
        foreach (array_keys($this->fields) as $field){
            $reply->$field = $request->get($field);
        }
        $reply->user_id=Auth::id();
        $now =  Carbon::now()->addHour();
        $reply->published_at = $now->format('Y-m-d g:i');
        $reply->save();
        $reply->syncTopic();
        return back()
            ->with('success','评论已发布');
    }


//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $reply = Reply::where('id',$id)->firstOrFail();
        $reply->content=$request->get('content');
        $reply->save();

        return back()
            ->with('success','评论' . '更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $reply = Reply::where('id',$id)->firstOrFail();
        if ($reply->user_id!=Auth::id())
            return 403;//TODO:403
        //todo topic detach
        try {
            $reply->delete();
        } catch (\Exception $e) {
            return back()
                ->with('error',$e.'删除失败');
        }
        return back()
            ->with('success','删除成功');
    }
}
