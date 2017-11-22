@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 panel panel-default">
            
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create Candidate</div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::open(['route' => 'adminCandidatesStore', 'files' => true]) }}
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('photo', 'Avatar') !!}
                                <div class="form-controls">
                                    {{ Form::file(('photo'), null, ['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::hidden('avatar')}}
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            <div class="form-controls">
                                {{ Form::text('email', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number:') !!}
                            <div class="form-controls">
                                {{ Form::text('phone_number', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('numbers_cmnd', 'Number Identity Card:') !!}
                            <div class="form-controls">
                                {{ Form::text('numbers_cmnd', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_of_birth', 'Date of birth:') !!}
                            <div class="form-controls">
                                {{ Form::date('date_of_birth', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('graduation_year', 'Graduation Year:') !!}
                            <div class="form-controls">
                                {{ Form::date('graduation_year', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Address:') !!}
                            <div class="form-controls">
                                {{ Form::text('address', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('apply_id', 'Apply Type') !!}
                            <div class="form-controls">
                                {!! Form::select('apply_id', $applies, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('branch_id', 'Branch Name') !!}
                            <div class="form-controls">
                                {!! Form::select('branch_id', $branches, '10', ['class'=>'form-control', 'id' => 'branch_select']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('specialized_id', 'Specialized Name') !!}
                            <div class="form-controls">
                                {!! Form::select('specialized_id', $specializeds, '10', ['class'=>'form-control', 'id' => 'specialized_select']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('set_id', 'Subject Set') !!}
                            <div class="form-controls">
                                {!! Form::select('set_id', $sets, '10', ['class'=>'form-control', 'id' => 'branch_select']) !!}
                            </div>
                        </div>

                       {{--  <div class="form-group">
                            {!! Form::label('subjects', 'Subject Name:') !!}
                            <div class="form-controls">
                                {{ Form::select('subjects[]', $subjects, null, ['id' => 'subjects', 'multiple' => 'multiple', 'class'=>'form-control']) }}
                            </div>
                        </div> --}}
                        <div class="form-group">
                        <input type="" name="subject_id" value="subject_id" hidden>
                        <label for="subject_id" class="control-label">Subject</label>
                            <div class="form-controls">
                                <div id="subject_id">
                                    @foreach ($subjects as $subject)
                                        <div value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            <span>{{ $subject->name }}</span>
                                            <input id="{{ $subject->id }}" type="text" value="" name="points[{{ $subject->id }}]" class= "form-control"> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('candidate_type_id', 'Candidate Type') !!}
                            <div class="form-controls">
                                {!! Form::select('candidate_type_id', $candidateTypes, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('confirm_id', 'Status') !!}
                            <div class="form-controls">
                                {!! Form::select('confirm_id', $confirms, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('area_id', 'Area') !!}
                            <div class="form-controls">
                                {!! Form::select('area_id', $areas, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('country_id', 'Country') !!}
                            <div class="form-controls">
                                {!! Form::select('country_id', $countries, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('city_id', 'City') !!}
                            <div class="form-controls">
                                {!! Form::select('city_id', $cities, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('ward_id', 'Ward') !!}
                            <div class="form-controls">
                                {!! Form::select('ward_id', $wards, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('school_id', 'School') !!}
                            <div class="form-controls">
                                {!! Form::select('school_id', $schools, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                        <a href="{{ route('adminCandidates')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection