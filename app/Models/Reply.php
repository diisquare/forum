<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public static function getReplies($repliesId){
        return Reply::whereIn('id',$repliesId)
            ->orderBy('published_at', 'desc')
            ->paginate(config('diisquare.reply_per_page'));
    }
}
