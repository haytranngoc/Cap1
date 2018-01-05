<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'country_id'];

    public function schools()
    {
        return $this->hasMany('App\School');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    } 
}
