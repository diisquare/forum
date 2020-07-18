<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $dates=['published_at'];

    public function setTitle($value){
        $this->attributes['title']=$value;
    }
}
