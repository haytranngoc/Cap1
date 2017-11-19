<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateImage extends Model
{
    protected $fillable = ['image'];

    public function candidates()
    {
    	return $this->belongsTo('App\Candidate');
    }
}
