<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = ['name', 'description', 'color'];

    public function blogs()
    {
        return $this->hasMany('App\Blog', 'category');
    }
}
