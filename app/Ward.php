<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['name', 'city_id'];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function schools()
    {
    	return $this->hasMany('App\School');
    }
}
