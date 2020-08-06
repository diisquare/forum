<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Section
 *
 * @method static where(string $string, $sid)
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $postCount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section wherePostCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Section extends Model
{
    protected $dates=['published_at'];

    public function setTitle($value){
        $this->attributes['title']=$value;
    }
}
