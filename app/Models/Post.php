<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $sid
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $goodQuestionCount
 * @property int $replyCount
 * @property int $user_id
 * @property string|null $published_at
 * @property string|null $last_reply_at
 * @property string|null $repliesStr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $replies_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereGoodQuestionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLastReplyAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRepliesStr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereReplyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;
    protected $fillable=['title','content','sid','user_id','repliesStr'];
    protected $guarded=['repliesCount','goodQuestionCount'];
    public function getRepliesIdAttribute(){
        return getRepliesId($this->repliesStr);
    }
    public function replies(){
        return Reply::getReplies($this->replies_id);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    ## TODO: edit corresponding method
}
