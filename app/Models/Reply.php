<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reply
 *
 * @property int $id
 * @property string $content
 * @property int $topic
 * @property int $topicId
 * @property int|null $fatherId
 * @property int|null $atId
 * @property string|null $atName
 * @property string|null $deleted_at
 * @property int $agreeCount
 * @property int $publisherId
 * @property string $publisherName
 * @property string|null $publisherAvatar
 * @property string|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Reply newModelQuery()
 * @method static Builder|Reply newQuery()
 * @method static Builder|Reply query()
 * @method static Builder|Reply whereAgreeCount($value)
 * @method static Builder|Reply whereAtId($value)
 * @method static Builder|Reply whereAtName($value)
 * @method static Builder|Reply whereContent($value)
 * @method static Builder|Reply whereCreatedAt($value)
 * @method static Builder|Reply whereDeletedAt($value)
 * @method static Builder|Reply whereFatherId($value)
 * @method static Builder|Reply whereId($value)
 * @method static Builder|Reply wherePublishedAt($value)
 * @method static Builder|Reply wherePublisherAvatar($value)
 * @method static Builder|Reply wherePublisherId($value)
 * @method static Builder|Reply wherePublisherName($value)
 * @method static Builder|Reply whereTopic($value)
 * @method static Builder|Reply whereTopicId($value)
 * @method static Builder|Reply whereUpdatedAt($value)
 * @method static whereIn(string $string, $repliesId)
 * @method static where(string $string, int $id)
 */
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

    public static function getReplies($repliesId){
        return Reply::whereIn('id',$repliesId)
            ->orderBy('published_at', 'desc')
            ->paginate(config('diisquare.reply_per_page'));
    }
}
