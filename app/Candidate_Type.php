<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Type extends Model
{
    protected $fillable = ['name'];

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }
}
