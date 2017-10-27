<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['candidate_id', 'subject_id', 'point'];

    public function candidate()
    {
    	return $this->hasMany('App\Candidate');
    }

    public function subject()
    {
    	return $this->hasMany('App\Subject');
    }
}
