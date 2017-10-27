<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'ward_id'];

    public function ward()
    {
    	return $this->belongsTo('App\Ward');
    }

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
