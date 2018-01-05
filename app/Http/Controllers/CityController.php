<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\School;
use App\Specialized;

class CityController extends Controller
{
    public function showCitiesInCountry(Request $request)
    {
        if ($request->ajax()) {
            $specializeds = Specialized::where('branch_id', $request->branch_id)->select('id', 'name')->get();

            return response()->json($specializeds);
        }
        //dd($specializeds);
    }
    public function select(Request $request)
    {
        $cities = City::where('country_id', $request->id)->get();
        $schools = School::where('city_id', $cities[0]['id'])->get();
        $cities['schools'] = $schools;
        return $cities;
    }
}