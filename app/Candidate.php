<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['full_name', 'avatar', 'numbers_cmnd', 'graduation_year', 'date_of_birth', 'address', 'apply_type_id', 'branch_id', 'candidate_type_id', 'subject_set_id', 'area_id', 'school_id'];
    
    public function school()
    {
    	return $this->belongsTo('App\School');
    }

    public function apply_type()
    {
    	return $this->belongsTo('App\Apply_Type');
    }

    public function branch()
    {
    	return $this->belongsTo('App\Brach');
    }

    public function subject_set()
    {
    	return $this->belongsTo('App\Subject_Set');
    }

    public function grades()
    {
    	return $this->hasMany('App\Grade');
    }

    public function candidate_type()
    {
    	return $this->belongsTo('App\Candidate_Type');
    }

    public function candidate_images()
    {
    	return $this->hasMany('App\Candidate_Image');
    }

    public function area()
    {
    	return $this->belongsTo('App\Area');
    }
}
