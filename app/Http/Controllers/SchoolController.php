<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SchoolController extends Controller
{
    public function select(Request $request)
    {
        $schools = School::where('city_id', $request->id)->get();
        return $schools;
    }
}
