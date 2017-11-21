@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Show of Canidates
            </div>

            <div class="panel-body">
                <div >
                    <h2><div><p>Status : {{ $candidate->confirmed }}</p></div></h2>
                    <div class="col-md-2">
                        <div><img src="/uploads/avatars/{{ $candidate->avatar }}" style="width:150px; height:150px; float:left; border-radius:2%;" ></div>
                    </div>
                    <div class="col-md-4">
                        <div><p><b>Full Name : </b>{{ $candidate->getFullName() }}</p></div>
                        <div><p><b>Email : </b>{{ $candidate->email }}</p></div>
                        <div><p><b>Phone Number : </b>{{ $candidate->phone_number }}</p></div>
                        <div><p><b>Date of birth : </b>{{ $candidate->date_of_birth }}</p></div>
                        <div><p><b>Graduation Year : </b>{{ $candidate->graduation_year }}</p></div>
                        <div><p><b>Number Identity Card : </b>{{ $candidate->numbers_cmnd }} </p></div>
                        <div><p><b>Graduation Year : </b>{{ $candidate->graduation_year }}</p></div>
                        <div><p><b>Address : </b>{{ $candidate->address }}</p></div>
                    </div>
                    <div class="col-md-6">
                        <div><p><b>Apply Type : </b>{{ $candidate->apply->name }}</p></div>
                        <div><p><b>Candidate Type : </b>{{ $candidate->candidateType->name }} ||<b> Point : </b>{{ $candidate->candidateType->bonus_point }}</p></div>
                        <div><p><b>Area : </b>{{ $candidate->area->name }} || <b>Point : </b>{{ $candidate->area->bonus_point }}</p></div>
                        <div><p><b>School : </b>{{ $candidate->school->name }} || <b>Ward : </b>{{ $candidate->school->ward->name }} || <b>City : </b>{{ $candidate->school->ward->city->name }}</p></div>
                        <div><p><b>Branch : </b>{{ $candidate->branch->name }} || <b>Specialized : </b>{{ $candidate->specialized->name }}</p></div>
                        <div><b>Subjec Set : </b>{{ $candidate->set->name }}</div>
                        @foreach ($candidate->subjects as $subject)
                            <div><p><b>{{ $subject->name }} : </b>{{ $subject->pivot->point }}</p></div>
                        @endforeach
                        <div><p>Total :{{ $total }}</p></div>
                    </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection