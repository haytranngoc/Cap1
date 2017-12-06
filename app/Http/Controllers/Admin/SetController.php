<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Set;
use App\Subject;
use App\Http\Controllers\Controller;

class SetController extends Controller
{
    public function index()
    {
        $sets = Set::with('subjects')->get();
        return view('admin.sets.index')->with('sets', $sets);
    }

    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        return view('admin.sets.create')->with('subjects', $subjects);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sets|max:255',
        ]);
        /*$set = new Set();*/
        $set = Set::create($request->all()); 
        $set->subjects()->attach($request->subjects);
        return redirect()->route('admin.sets.index');
    }

    public function edit($id)
    {
        $set = Set::findOrFail($id);
        return view('admin.sets.edit')->with('set', $set);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:sets,name,'.$id,
        ]);
        $set = Set::findOrFail($id);
        $set->update($request->all());
        return redirect()->route('admin.sets.index');
    }
    
    public function destroy($id)
    {
        Set::destroy($id);
        return redirect()->route('admin.sets.index');
    }

    /*public function select(Request $request)
    {
        $sets = Set::where('branch_id', $request->id)->get();
        return $sets;
    }*/
}
