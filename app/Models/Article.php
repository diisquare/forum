<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $sid
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $agreeCount
 * @property int $replyCount
 * @property int $publisherId
 * @property string|null $repliesStr
 * @property string|null $published_at
 * @property string|null $last_reply_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $replies_id
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereAgreeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereLastReplyAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublisherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereRepliesStr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereReplyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Article withoutTrashed()
 * @mixin \Eloquent
 */
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
