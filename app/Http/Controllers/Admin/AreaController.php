<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Area;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index')->with('areas', $areas);
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:areas|max:255',
            'bonus_point' => 'required|numeric:areas|max:255',
        ]);
        Area::create($request->all());
        return redirect()->route('admin.areas.store');
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.areas.edit')->with('area', $area);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:areas,name,'.$id,
            'bonus_point' => 'required|numeric:areas,bonus_point,'.$id,
        ]);
        $area = Area::findOrFail($id);
        $area->update($request->all());
        return redirect()->route('admin.areas.index');
    }
    
    public function destroy($id)
    {
        Area::destroy($id);
        return redirect()->route('admin.areas.index');
    }
}
