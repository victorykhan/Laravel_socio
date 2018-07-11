<?php

namespace App;
use App\User;
use App\Textpost;
use App\Picture;
use App\Video;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function textpost()
    {
        return $this->belongsTo('App\Textpost');
    }
    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }

    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
