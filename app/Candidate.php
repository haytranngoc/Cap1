<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Candidate extends Model
{
    protected $fillable = ['first_name', 'last_name', 'avatar', 'email', 'phone_number', 'numbers_cmnd', 
    'graduation_year', 'date_of_birth', 'address', 'confirm_id', 'apply_id', 'candidate_type_id', 'area_id', 
    'school_id', 'branch_id', 'set_id', 'specialized_id'];
    
    public function school()
    {
    	return $this->belongsTo('App\School');
    }

    public function apply()
    {
    	return $this->belongsTo('App\Apply');
    }

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }

    public function subjects()
    {
    	return $this->belongsToMany('App\Subject', 'grades', 'candidate_id', 'subject_id')->withPivot('point')->withTimestamps();
    }

    public function candidateType()
    {
    	return $this->belongsTo('App\CandidateType');
    }

    public function candidateImages()
    {
    	return $this->hasMany('App\CandidateImage');
    }

    public function area()
    {
    	return $this->belongsTo('App\Area');
    }

    public function set()
    {
        return $this->belongsTo('App\Set');
    }

    public function specialized()
    {
        return $this->belongsTo('App\Specialized');
    }

    public function confirm()
    {
        return $this->belongsTo('App\Confirm');
    }

    public function getFullName()
    {
        $first_name = $this->getAttribute("first_name");
        $last_name = $this->getAttribute("last_name");
        return "{$first_name}, {$last_name}";
    }
}
