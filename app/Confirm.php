<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $fillable = ['name'];

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
