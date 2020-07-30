<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function syncTopic(){
        switch ($this->topic){
            case 0:
                // post
            case 1:
                //article
                $article = Article::where('id',$this->topicId)->firstOrFail();
                $newRepliesStr = $article->repliesStr."$this->id".';';
                $article->repliesStr = $newRepliesStr;
                $article->save();
        }
    }

    public function syncDate(){
        $publisher = User::where('id',$this->publisherId)->firstOrFail();
        $this->publisherName = $publisher->name;
        $this->publisherAvatar=$publisher->details->avator;
        if ($this->atId==0)
            return;
        else{
            $at = $publisher = User::where('id',$this->atId)->firstOrFail();
            $this->atName=$at->name;
            return;
        }
    }

    public static function getReplies($repliesId){
        return Reply::whereIn('id',$repliesId)
            ->orderBy('published_at', 'desc')
            ->paginate(config('diisquare.reply_per_page'));
    }
}
