<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    function video(){
        return $this->belongsTo('App\Video');
    }

    protected $fillable = [
        'author','comment','video_id'
    ];
}
