<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    function category(){
        //belongs to relation with categories
        return $this->belongsTo('App\Category');
    }

    function comments(){
        // return relation of video for comments
        return $this->hasMany('App\Comment');
    }

    protected $fillable = [
        'title', 'url'
    ];
}
