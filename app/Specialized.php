<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialized extends Model
{
    protected $fillable = ['branch_id', 'specialized_code', 'name', 'point'];

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
