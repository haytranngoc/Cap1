<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['branch_code', 'name', 'point'];

    /*protected $guarded = ['id'];*/
    public function candidates()
    {
    	return $this->hasMany('App\Candidate');
    }

    public function specializeds()
    {
    	return $this->hasMany('App\Specialized');
    }

    public function sets()
    {
    	return $this->belongsToMany('App\Set', 'branch_sets', 'branch_id', 'set_id')->withTimestamps();
    }
}
