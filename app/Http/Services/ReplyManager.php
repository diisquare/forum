<?php

namespace App\Http\Services;

use App\Models\Reply;

class ReplyManager{

    private $repliesString;

    public function __construct($repliesString)
    {
        $this->repliesString=$repliesString;
    }


    public function getReplies(){
        $repliesId=explode(';',$this->repliesString,-1);
        return Reply::whereIn('id',$repliesId)
            ->orderBy('published_at', 'desc')
            ->paginate(3);
    }
}

