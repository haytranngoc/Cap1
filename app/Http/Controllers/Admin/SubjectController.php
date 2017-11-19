<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Subject;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index')->with('subjects', $subjects);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:subjects|max:255',
        ]);
        Subject::create($request->all());
        return redirect()->route('adminSubjects');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit')->with('subject', $subject);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:subjects,name,'.$id,
        ]);
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('adminSubjects');
    }
    
    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect()->route('adminSubjects');
    }
}
