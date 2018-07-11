<?php

namespace App;
use App\User;
use App\Category;

use App\Comment;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
