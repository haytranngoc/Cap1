<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['branch_code', 'name'];

    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }

    public function specializeds()
    {
    	return $this->hasMany('App\Specialized');
    }

    public function brach_subject_sets()
    {
    	return $this->hasMany('App\Branch_Subject_Set');
    }
}
