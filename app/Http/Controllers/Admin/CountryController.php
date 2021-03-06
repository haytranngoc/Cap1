<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index')->with('countries', $countries);
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:countries|max:255',
        ]);
        Country::create($request->all());
        return redirect()->route('admin.countries.index');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.edit')->with('country', $country);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:countries,name,'.$id,
        ]);
        $country = Country::findOrFail($id);
        $country->update($request->all());
        return redirect()->route('admin.countries.index');
    }

    public function show()
    {
        
    }
    
    public function destroy($id)
    {
        Country::destroy($id);
        return redirect()->route('admin.countries.index');
    }

    // public function select(Request $request)
    // {
    //     $countries = Country::all();
    //     return $countries;
    // }

}
