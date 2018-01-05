<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'city_id'];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
