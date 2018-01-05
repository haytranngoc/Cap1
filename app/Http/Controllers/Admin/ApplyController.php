<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Apply;
use App\Http\Controllers\Controller;

class ApplyController extends Controller
{
    public function index()
    {
        $applies = Apply::all();
        return view('admin.applies.index')->with('applies', $applies);
    }

    public function create()
    {
        return view('admin.applies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:applies|max:255',
        ]);
        Apply::create($request->all());
        return redirect()->route('admin.applies.index');
    }

    public function edit($id)
    {
        $apply = Apply::findOrFail($id);
        return view('admin.applies.edit')->with('apply', $apply);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:applies,name,'.$id,
        ]);
        $apply = Apply::findOrFail($id);
        $apply->update($request->all());
        return redirect()->route('admin.applies.index');
    }
    
    public function destroy($id)
    {
        Apply::destroy($id);
        return redirect()->route('admin.applies.index');
    }
}
