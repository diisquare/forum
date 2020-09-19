<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserDetail
 *
 * @property int $user_id
 * @property int $isBanned
 * @property string|null $avatar
 * @property string|null $slogan
 * @property int $postCount
 * @property int $goodQuestionCount
 * @property int $AgreeCount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereAgreeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereGoodQuestionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereIsBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail wherePostCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereUserId($value)
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    /**
     * get the user that owns the details
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
