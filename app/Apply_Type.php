<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply_Type extends Model
{
    protected $fillable = ['name'];

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
