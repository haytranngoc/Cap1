<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'slug', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function postImages()
    {
    	return $this->hasMany('App\PostImage');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
