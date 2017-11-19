<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Branch;
use App\Set;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index')->with('branches', $branches);
    }

    public function create()
    {
        $sets = Set::pluck('name', 'id');
        return view('admin.branches.create')->with('sets', $sets);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_code' => 'required|unique:branches|max:255',
            'name' => 'required|unique:branches|max:255',
        ]);
        /*$branch = new Branch();*/
        $branch = Branch::create($request->all()); 
        $branch->sets()->attach($request->sets);
        return redirect()->route('adminBranches');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $sets = Set::pluck('name', 'id');
        return view('admin.branches.edit')->with('branch', $branch);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'branch_code' => 'required|unique:branches,branch_code,'.$id,
            'name' => 'required|unique:branches,name,'.$id,
        ]);
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        return redirect()->route('adminBranches');
    }
    
    public function destroy($id)
    {
        Branch::destroy($id);
        return redirect()->route('adminBranches');
    }
}