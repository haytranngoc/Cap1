<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Country;
use App\City;
use App\Ward;
use App\School;
use App\Apply;
use App\Area;
use App\CandidateType;
use App\Subject;
use App\Branch;
use App\Set;

class CandidateController extends Controller
{
    public function index()
    {
    	$candidates = Candidate::all();
        return view('admin.candidates.index')->with('candidates', $candidates);
    }

    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admin.candidates.show')->with('candidate', $candidate);
    }

    public function create()
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $wards =  Ward::pluck('name', 'id');
        $schools = School::pluck('name', 'id');
        $applies = Apply::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        $candidateTypes = CandidateType::pluck('name', 'id');
        $subjects = Subject::all(['id', 'name']);
        //$subjects = Subject::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $sets = Set::pluck('name', 'id');

        $data = compact('countries', 'cities', 'wards', 'schools', 'applies', 'areas', 'candidateTypes', 'subjects', 'branches', 'sets');
        return view('admin.candidates.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|unique:candidates|max:255',
            'last_name' => 'required|unique:candidates|max:255',
            'email' => 'required|unique:candidates|email',
            'phone_number' => 'required|numeric:candidates|max:15',
            'numbers_cmnd' => 'required|numeric:candidates|max:11',
            'date_of_birth' =>
        ]);
        $data = $request->only([
            'first_name', 'last_name', 'email', 'phone_number', 'numbers_cmnd', 'date_of_birth','country_id', 'city_id', 'ward_id', 
            'school_id', 'apply_id', 'set_id', 'area_id', 'candidate_type_id',
            'subject_id', 'branch_id'
        ]);
        $candidate = Candidate::create($data);
        foreach ($request->points as $subject_id => $point) {
            $candidate->subjects()->attach($subject_id, ['point' => $point]);
        }
        return redirect()->route('adminCandidates');
    }

    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect()->route('adminCandidates');
    }
}
