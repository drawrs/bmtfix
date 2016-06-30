<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
