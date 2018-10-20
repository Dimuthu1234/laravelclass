<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'image'];

    public function blogAuthor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}

