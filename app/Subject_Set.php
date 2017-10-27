<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_Set extends Model
{
    protected $fillable = ['name'];

    public function brach_subject_sets()
    {
    	return $this->hasMany('App\Branch_Subject_Set');
    }

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }

    public function subjects()
    {
    	return $this->hasMany('App\Subject');
    }
}
