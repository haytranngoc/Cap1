<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CandidateType;

class CandidateTypeController extends Controller
{
    public function index()
    {
        $candidateTypes = CandidateType::all();
        return view('admin.candidateTypes.index')->with('candidateTypes', $candidateTypes);
    }

    public function create()
    {
        return view('admin.candidateTypes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:candidate_types|max:255',
            'bonus_point' => 'required|numeric:candidate_types|max:255',
        ]);
        CandidateType::create($request->all());
        return redirect()->route('admin.candidateTypes.index');
    }

    public function edit($id)
    {
        $candidateType = CandidateType::findOrFail($id);
        return view('admin.candidateTypes.edit')->with('candidateType', $candidateType);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:candidate_types,name,'.$id,
            'bonus_point' => 'required|numeric:candidate_types,bonus_point,'.$id,
        ]);
        $candidateType = CandidateType::findOrFail($id);
        $candidateType->update($request->all());
        return redirect()->route('admin.candidateTypes.index');
    }
    
    public function destroy($id)
    {
        CandidateType::destroy($id);
        return redirect()->route('admin.candidateTypes.index');
    }
}
