<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Ward;
use App\City;
use App\Http\Controllers\Controller;

class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::all();
        return view('admin.wards.index')->with('wards', $wards);
    }

    public function create()
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        return view('admin.wards.create')
        ->with('countries', $countries)
        ->with('cities', $cities);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:wards|max:255',
            'country_id' => 'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ]);
        Ward::create($request->all());
        return redirect()->route('adminWards');
    }

    public function edit($id)
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $ward = Ward::findOrFail($id);
        return view('admin.wards.edit')->with('ward', $ward)
        		->with('countries', $countries)
                ->with('cities', $cities);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:wards,name,'.$id,
            'country_id' => 'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ]);
        $ward = Ward::findOrFail($id);
        $ward->update($request->all());
        return redirect()->route('adminWards');
    }

    public function destroy($id)
    {
        Ward::destroy($id);
        return redirect()->route('adminWards');
    }

    public function select(Request $request)
    {
        $wards = Ward::where('city_id', $request->id)->get();
        return $wards;
    }
}
