<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * get the user that owns the details
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
