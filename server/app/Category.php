<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    function videos(){
        return $this->hasMany('App\Video');
    }

    protected $fillable = [
        'title','favorite'
    ];
}
