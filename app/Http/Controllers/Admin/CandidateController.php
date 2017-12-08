<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use PDF;
use Carbon\Carbon;


class CandidateController extends Controller
{
    public function index()
    {
    	$candidates = Candidate::orderBy('created_at', 'DESC')->get();
        return view('admin.candidates.index')->with('candidates', $candidates);
    }

    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidateType = CandidateType::findOrFail($candidate->candidate_type_id);
        $area = Area::findOrFail($candidate->area_id);
        $branch = Branch::findOrFail($candidate->branch_id);
        $specialized = Specialized::findOrFail($candidate->specialized_id);
        $total = $area->bonus_point + $candidateType->bonus_point;
        foreach ($candidate->subjects as $subject) {
            $total += $subject->pivot->point;
        }
        $mes = " ";
        if($total >= $branch->point)
        {
            if($total >= $specialized->point){
                $mes = "Correct Point ";
            }
            else {
                $mes ="Not Enough Point Specialized. Specialized ". $specialized->name . " Point is " . $specialized->point;
            }
        }
        else
        {
            $mes ="Not Enough Point Branch. Branch " . $branch->name . " Point is " . $branch->point;
        }

        
        //dd($total);
        return view('admin.candidates.show', compact("candidate", "total", "mes"));
    }

    public function showConfirm()
    {
        $candidates = Candidate::orderBy('created_at', 'DESC')->where('confirm', 1)->get();
        return view('admin.candidates.confirm')->with('candidates', $candidates);
    }

    public function showUnconfirm()
    {
        $candidates = Candidate::orderBy('created_at', 'DESC')->where('confirm', 0)->get();
        return view('admin.candidates.uncofirm')->with('candidates', $candidates);
    }

    // public function active()
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     $active = $candidate->confirm;
    //     if($active = false)
    //     {
    //         $active = true;
    //     }
    //     else
    //     {
    //         $active = false;
    //     }
    //     dd($active);
    //     redirect()->route('admin.candidates.index'); 

    // }

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
        return view('admin.candidates.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:candidates|email',
            'phone_number' => 'required|numeric:candidates|regex:/(0)[0-9]{9}/',
            'numbers_cmnd' => 'required|numeric:candidates|digits_between:9,12',
            'date_of_birth' => 'required|date:candidates',
            'photo' => 'required|image|mimes:jpeg,bmp,jpg,png,gif|max:2000'
        ]);
        $data = $request->only([
            'avatar', 'first_name', 'last_name', 'email', 'phone_number', 'numbers_cmnd', 'date_of_birth', 
            'graduation_year', 'country_id', 'city_id',
            'school_id', 'apply_id', 'set_id', 'area_id', 'candidate_type_id',
            'subject_id', 'branch_id', 'set_id', 'specialized_id', 'confirm', 'address'
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
        return redirect()->route('admin.candidates.index');
    }

    // public function edit($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     $countries = Country::pluck('name', 'id');
    //     $cities = City::pluck('name', 'id');
    //     $schools = School::pluck('name', 'id');
    //     $apply = Apply::findOrFail($candidate->apply_id);
    //     $area = Area::findOrFail($candidate->area_id);
    //     $candidateType = CandidateType::findOrFail($candidate->candidate_type_id);
        
    // }


    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect()->route('admin.candidates.index');
    }

    public function getPDF($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidateType = CandidateType::findOrFail($candidate->candidate_type_id);
        $area = Area::findOrFail($candidate->area_id);
        $branch = Branch::findOrFail($candidate->branch_id);
        $specialized = Specialized::findOrFail($candidate->specialized_id);
        $total = $area->bonus_point + $candidateType->bonus_point;
        foreach ($candidate->subjects as $subject) {
            $total += $subject->pivot->point;
        }
        $pdf = PDF::loadView('admin.candidates.cv', compact("candidate", "total"));
        return $pdf->stream('cv.pdf');
    }
}
