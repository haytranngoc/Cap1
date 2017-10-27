<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch_Subject_Set extends Model
{
    protected $fillable = ['subject_set_id', 'branch_id'];

    public function branch()
    {
    	return $this->belongsTo('App\Brach');
    }

    public function subject_set()
    {
    	return $this->belongsTo('App\Subject_Set');
    }
}
