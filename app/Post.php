<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function post_images()
    {
    	return $this->hasMany('App\Post_Image');
    }
}
