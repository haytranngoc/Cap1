<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = ['name'];

    /*protected $guarded = ['id'];*/
    public function branches()
    {
    	return $this->belongsToMany('App\Branch', 'branch_sets', 'branch_id', 'set_id')->withTimestamps();
    }

    public function subjects()
    {
    	return $this->belongsToMany('App\Subject', 'subject_sets', 'set_id', 'subject_id')->withTimestamps();
    }
}
