<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Image extends Model
{
    protected $fillable = ['image', 'name', 'post_id'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
