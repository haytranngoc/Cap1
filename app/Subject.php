<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function sets()
    {
    	return $this->belongsToMany('App\Set', 'subject_sets', 'set_id', 'subject_id')->withTimestamps();
    }

    public function candidates()
    {
    	return $this->belongsToMany('App\Candidate', 'grades', 'candidate_id', 'subject_id')->withPivot('point')->withTimestamps();
    }
}
