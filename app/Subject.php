<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_set_id', 'name'];

    public function subject_set()
    {
    	return $this->belongsTo('App\Subject_Set');
    }

    public function grades()
    {
    	return $this->hasMany('App\Grade');
    }
}
