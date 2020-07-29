<?php

namespace App\Models;

use App\Http\Services\ReplyManager;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable=['title','content','sid','publisherId','repliesStr'];
    protected $guarded=['repliesCount','agreeCount'];

    public function getRepliesIdAttribute(){
        return getRepliesId($this->repliesStr);
    }

    public function replies(){
        return Reply::getReplies($this->replies_id);
    }
}
