<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Country;
use App\City;
use App\School;
use App\Apply;
use App\Area;
use App\CandidateType;
use App\Subject;
use App\Branch;
use App\Set;
use App\Specialized;
use App\CandidateImage;
use Carbon\Carbon;
use DB;

class CandidateController extends Controller
{
    public function create()
    {
    	$countries = Country::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $schools = School::pluck('name', 'id');
        $applies = Apply::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        $candidateTypes = CandidateType::pluck('name', 'id');
        $subjects = Subject::all(['id', 'name']);
        $branches = Branch::all(['name', 'id']);
        $sets = Set::all(['name', 'id']);
        $specializeds = Specialized::all(['name', 'id']);

        $data = compact('countries', 'cities', 'schools', 'applies', 'areas', 'candidateTypes', 'subjects', 'branches', 'sets', 'specializeds');
        //dd($data);
        return view('registerStudent.create', $data);
    }

    public function branches(Request $request)
    {
        if ($request->has('branch_id')) {
            $branch = Branch::with('sets', 'specializeds')->find($request->branch_id);

            $sets = $branch->sets;
            $specializeds = $branch->specializeds;

            return response()->json(compact('sets', 'specializeds'), 200);
        }
        return response()->json([], 400);
    }

    public function subjects(Request $request)
    {
        if ($request->has('set_id')) {
            $set = Set::with('subjects')->find($request->set_id);
            $subjects = $set->subjects;

            return compact('subjects');
        }
        return response()->json([], 400);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:candidates|email',
            'phone_number' => 'required|numeric:candidates|regex:/(0)[0-9]{9}/',
            'numbers_cmnd' => 'required|unique:candidates|numeric:candidates|digits_between:9,12',
            'date_of_birth' => 'required|date:candidates',
            'photo' => 'required|image|mimes:jpeg,bmp,jpg,png,gif|max:2000',
        ]);
        $data = $request->only([
            'avatar', 'first_name', 'last_name', 'email', 'phone_number', 'numbers_cmnd', 'date_of_birth', 
            'graduation_year', 'country_id', 'city_id', 
            'school_id', 'apply_id', 'set_id', 'area_id', 'candidate_type_id',
            'subject_id', 'branch_id', 'set_id', 'specialized_id', 'address'
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
        
        // foreach ($request->photos as $photo) {
        //     $filename = $photo->move('public/photos');
        //     CandidateImage::create([
        //         'candidate_id' => $candidate->id,
        //         'image' => $filename
        //     ]);

        // }
        return redirect()->route('home');
    }
}
