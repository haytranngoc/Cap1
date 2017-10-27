<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Image extends Model
{
    protected $fillable = ['image'];

    public function candidates()
    {
    	return $this->belongsTo('App\Candidate');
    }
}
