<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Ward;
use App\School;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('admin.schools.index')->with('schools', $schools);
    }

    public function create()
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $wards =  Ward::pluck('name', 'id');
        return view('admin.schools.create')
        ->with('countries', $countries)
        ->with('cities', $cities)
        ->with('wards', $wards);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:schools|max:255',
            'country_id' => 'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'ward_id' => 'required|numeric|exists:wards,id',
        ]);
        School::create($request->all());
        return redirect()->route('adminSchools');
    }

    public function edit($id)
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $wards = Ward::pluck('name', 'id');
        $school = School::findOrFail($id);
        return view('admin.schools.edit')->with('school', $school)
        		->with('countries', $countries)
                ->with('cities', $cities)
                ->with('wards', $wards);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:schools,name,'.$id,
            'country_id' => 'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'city_id' => 'required|numeric|exists:wards,id',
        ]);
        $school = School::findOrFail($id);
        $school->update($request->all());
        return redirect()->route('adminSchools');
    }

    public function destroy($id)
    {
        School::destroy($id);
        return redirect()->route('adminSchools');
    }
}
