<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;

class Post extends Model
{
    public function replies(){
        return Reply::getReplies($this->repliesStr);
    }
}
