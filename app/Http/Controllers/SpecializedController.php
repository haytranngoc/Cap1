<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialized;

class SpecializedController extends Controller
{
    public function select(Request $request)
    {
    	$specializeds = Specialized::where('branch_id', $request->id)->get();
    	dd($specializeds);
    	return $specializeds;
    }
}
