<?php

namespace App\Http\Services;

use App\Models\Reply;

class ReplyManager{
    public function getReplies($repliesString){
        $repliesId=explode(';',$repliesString,-1);
        return Reply::whereIn('id',$repliesId)
            ->orderBy('published_at', 'desc')
            ->paginate(3);
    }
}

