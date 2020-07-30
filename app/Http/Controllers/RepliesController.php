<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyCreateRequest;
use App\Models\Article;
use App\Models\Reply;
use Carbon\Carbon;
use http\Message;
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
        'publisherId'=>'',
        'published_at'=>''
    ];

    public function __construct()
    {
        $this->middleware('auth.check')->only('store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReplyCreateRequest $request)
    {
        $reply = new Reply();
        foreach (array_keys($this->fields) as $field){
            $reply->$field = $request->get($field);
        }
        $reply->publisherId=Auth::id();
        //TODO:atId
        $now =  Carbon::now()->addHour();
        $reply->published_at = $now->format('Y-m-d g:i');
        $reply->syncDate();
        $reply->save();
        $reply->syncTopic();

        return back()
            ->with('success','评论已发布');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
