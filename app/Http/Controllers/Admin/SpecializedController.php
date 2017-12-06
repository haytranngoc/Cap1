<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Branch;
use App\Specialized;
use App\Http\Controllers\Controller;

class SpecializedController extends Controller
{
    public function index()
    {
        $specializeds = Specialized::all();
        return view('admin.specializeds.index')->with('specializeds', $specializeds);
    }

    public function create()
    {
        $branches = Branch::pluck('name', 'id');
        return view('admin.specializeds.create')->with('branches', $branches);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'specialized_code' => 'required|unique:specializeds|max:255',
            'name' => 'required|unique:specializeds|max:255',
            'point' => 'required|numeric:specializeds|min:1|max:30',
            'branch_id' => 'required|numeric|exists:branches,id',
        ]);
        Specialized::create($request->all());
        return redirect()->route('admin.specializeds.index');
    }

    public function edit($id)
    {
        $specialized = Specialized::findOrFail($id);
        $branches = Branch::pluck('name', 'id');
        return view('admin.specializeds.edit')->with('specialized', $specialized)->with('branches', $branches);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        	'specialized_code' => 'required|unique:specializeds,specialized_code,'.$id,
            'name' => 'required|unique:specializeds,name,'.$id,
            'point' => 'required|numeric:specializeds|min:1|max:30,point,'.$id,
            'branch_id' => 'required|numeric|exists:branches,id',
        ]);
        $specialized = Specialized::findOrFail($id);
        $specialized->update($request->all());
        return redirect()->route('admin.specializeds.index');
    }
    
    public function destroy($id)
    {
        Specialized::destroy($id);
        return redirect()->route('admin.specializeds.index');
    }
}
