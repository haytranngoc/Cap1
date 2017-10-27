<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function showCitiesInCountry(Request $request)
    {
        if ($request->ajax()) {
            $cities = City::where('country_id', $request->country_id)->select('id', 'name')->get();

            return response()->json($cities);
        }
    }
}