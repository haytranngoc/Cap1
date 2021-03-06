@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        {{ Form::open(['route' => 'admin.candidates.store', 'files' => true]) }}
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                Create Candidate
                        <div class="form-controls">
                            {!! Form::select('confirm',[true => 'Confirm', false => 'Unconfirm' ], null, ['class'=>'form-control']) !!}
                        </div>
                </div>

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
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('photo', 'Avatar') !!}
                            <div class="form-controls">
                                {{ Form::file(('photo'), null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

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
                           <label >Branch Name</label>
                           <select name="branch_id" id="branch_id" class="form-control">
                               <option value="">Choose</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label >Specizaled Name</label>
                           <select name="specialized_id" id="specialized_id" class="form-control">
                               <option value="">Choose</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-4">  
                        <div class="form-group">
                            {!! Form::label('candidate_type_id', 'Candidate Type') !!}
                            <div class="form-controls">
                                {!! Form::select('candidate_type_id', $candidateTypes, null, ['class'=>'form-control']) !!}
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
                                {!! Form::select('country_id', $countries, null, ['class'=>'form-control', 'id' => 'country_select']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('city_id', 'City') !!}
                            <div class="form-controls">
                                {!! Form::select('city_id', $cities, null, ['class'=>'form-control', 'id' => 'city_select']) !!}
                            </div>
                        </div>
                        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
                        
                        <div class="form-group">
                            {!! Form::label('school_id', 'School') !!}
                            <div class="form-controls">
                                {!! Form::select('school_id', $schools, null, ['class'=>'form-control', 'id' => 'school_select']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('graduation_year', 'Graduation Year:') !!}
                            <div class="form-controls">
                                {{ Form::text('graduation_year', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Subject Set</label>
                            <select name="set_id" id="set_id" class="form-control">
                                <option value="">Choose</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="" name="subject_id" value="subject_id" hidden>
                            <div class="form-controls">
                                <div id="subject_id">
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                        <a href="{{ route('admin.candidates.index')}}">Cancel</a>
                    </div>
                    
                     
                </div>

            </div>
        </div>
        
        {{Form::close()}}
        
    </div>
</div>
@endsection
@section ('scripts')
<script>
    $('body').on('change', '#branch_id', function (e) {
        var id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{ route('candidates.branches') }}',
            data: {
                branch_id: id
            }
        }).done(function (res) {
            appendSets(res.sets, '#set_id');
            appendSets(res.specializeds, '#specialized_id');
        }).fail(function (error) {

        });
    });
    $('body').on('change', '#set_id', function (e) {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('candidates.subjects') }}',
            type: 'GET',
            data: {
                set_id: id
            }
        }).done(function (res) {
            appendInput(res.subjects);
        });
    })
    function appendSets (sets, selector) {
        $(selector).html('');
        $(selector).append('<option>Choose</option>');
        sets.map(function (item) {
            $(selector).append('<option value="' + item.id + '">' + item.name + '</option>');
        });
    }
    function appendInput (subjects) {
        var result = subjects.map(function (item) {
            return `<div class="form-group">
                <span>`+ item.name + `</span>
                <input id="subject_id_`+ item.id +`" type="number" required min="1" max="10" step="0.01" value="" name="points[`+ item.id +`]" class= "form-control"> 
            </div>`;
        });
        $('#subject_id').html(result);
    }
</script>
<script>
    window.onload = function(){
        var _token = $('input[name="_token"]').val();
        $('#city_select').empty();
        var id = $('#country_select').val();
        $.ajax({
            type: 'get',
            url: "/ajaxCity",
            data: {'id' : id ,
                    '_token' : _token},
            success: function(data){
                var schools = data['schools'];
                delete data['schools'];
                $.each(data, function(i,n) {
                    $('#city_select').append("<option value="+n.id+">"+n.name+"</option>");
                });
                $.each(schools, function(i,n) {
                    $('#school_select').append("<option value="+n.id+">"+n.name+"</option>");
                });
            },
            error: function(data){
                alert("fail" + ' ' +data)
            },
        });
    }
</script>
<script>
    $(document).ready(function() {
        var _token = $('input[name="_token"]').val();
        $('#country_select').change(function() {
            $('#city_select').empty();
            $('#school_select').empty();
            var id = $(this).val();
            $.ajax({
                type: 'get',
                url: "/ajaxCity",
                data: {'id' : id ,
                        '_token' : _token},
                success: function(data){
                    var schools = data['schools'];
                    delete data['schools'];
                    $.each(data, function(i,n) {
                        $('#city_select').append("<option value="+n.id+">"+n.name+"</option>");
                    });
                    $.each(schools, function(i,n) {
                        $('#school_select').append("<option value="+n.id+">"+n.name+"</option>");
                    });
                },
                error: function(data){
                    alert("fail" + ' ' +data)
                },
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#city_select').change(function() {
            $('#school_select').empty();
            var id = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: 'get',
                url: "/ajaxSchool",
                data: {'id' : id,
                      '_token' : _token },
                success: function(data){
                    for (var i = 0; i < data.length; i++) {
                        $('#school_select').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                    }
                },
                error: function(data){
                    alert("fail"+data)
                },
            });
        });
    });
</script>
@endsection