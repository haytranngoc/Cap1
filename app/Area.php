<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name', 'bonus_point'];

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
