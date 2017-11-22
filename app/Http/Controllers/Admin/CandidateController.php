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
use App\Specialized;
use App\Confirm;
use Carbon\Carbon;


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
        $candidateType = CandidateType::findOrFail($candidate->candidate_type_id);
        $area = Area::findOrFail($candidate->area_id);
        $total = $area->bonus_point + $candidateType->bonus_point;
        foreach ($candidate->subjects as $subject) {
            $total += $subject->pivot->point;
        }
        //dd($total);
        return view('admin.candidates.show', compact("candidate", "total"));
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
        $branches = Branch::pluck('name', 'id');
        $sets = Set::pluck('name', 'id');
        $specializeds = Specialized::pluck('name', 'id');
        $confirms = Confirm::pluck('name', 'id');

        $data = compact('countries', 'cities', 'wards', 'schools', 'applies', 'areas', 'candidateTypes', 'subjects', 'branches', 'sets', 'specializeds', 'confirms');
        //dd($data);
        return view('admin.candidates.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|unique:candidates|max:255',
            'last_name' => 'required|unique:candidates|max:255',
            'email' => 'required|unique:candidates|email',
            'phone_number' => 'required|numeric:candidates',
            'numbers_cmnd' => 'required|numeric:candidates',
            'date_of_birth' => 'required|date:candidates',
        ]);
        $data = $request->only([
            'avatar', 'first_name', 'last_name', 'email', 'phone_number', 'numbers_cmnd', 'date_of_birth', 
            'graduation_year', 'country_id', 'city_id', 'ward_id', 
            'school_id', 'apply_id', 'set_id', 'area_id', 'candidate_type_id',
            'subject_id', 'branch_id', 'set_id', 'specialized_id', 'confirm_id'
        ]);
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            $data['avatar'] = str_slug(Carbon::now().'_'.$data['first_name'].'.'.$file->getClientOriginalExtension());
            $file->move('uploads/avatars/', $data['avatar']);
        } else {
            $data['avatar'] = 'default.jpg';
        }
        $candidate = Candidate::create($data);
        foreach ($request->points as $subject_id => $point) {
            $candidate->subjects()->attach($subject_id, ['point' => $point]);
        }
        return redirect()->route('adminCandidates');
    }

    // public function edit($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     $countries = Country::pluck('name', 'id');
    //     $cities = City::pluck('name', 'id');
    //     $wards =  Ward::pluck('name', 'id');
    //     $schools = School::findOrFail($candidate->school_id);
    //     $ 
    // }

    // public function update(Request $request, $id)
    // {

    // }

    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect()->route('adminCandidates');
    }
}
