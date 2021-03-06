<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\School;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index')->with('cities', $cities);
    }

    public function create()
    {
        $countries = Country::pluck('name', 'id');
        return view('admin.cities.create')->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:cities|max:255',
            'country_id' => 'required|numeric|exists:countries,id',
        ]);
        City::create($request->all());
        return redirect()->route('admin.cities.index');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::pluck('name', 'id');
        return view('admin.cities.edit')->with('city', $city)->with('countries', $countries);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:cities,name,'.$id,
            'country_id' => 'required|numeric|exists:countries,id',
        ]);
        $city = City::findOrFail($id);
        $city->update($request->all());
        return redirect()->route('admin.cities.index');
    }
    
    public function destroy($id)
    {
        City::destroy($id);
        return redirect()->route('admin.cities.index');
    }

    public function select(Request $request)
    {
        $cities = City::where('country_id', $request->id)->get();
        $schools = School::where('city_id', $cities[0]['id'])->get();
        $cities['schools'] = $schools;
        return $cities;
    }

    /*public function selectCity(Request $request)
    {
        $cities = City::where('country_id', $request->id)->get();
        return $cities;
    }*/
}
