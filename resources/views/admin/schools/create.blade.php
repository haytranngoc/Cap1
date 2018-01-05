@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create School</div>

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
                    {{ Form::open(['route' => 'admin.schools.store']) }}
                        <div class="form-group">
                            {!! Form::label('name', 'School Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('country_id', 'Country') !!}
                            <div class="form-controls">
                                {{ Form::select('country_id', $countries, null, ['class'=>'form-control', 'id' => 'country_select']) }}
                            </div>
                        </div>
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
                        <div class="form-group">
                            {!! Form::label('city_id', 'City') !!}
                            <div class="form-controls">
                                {{ Form::select('city_id', [], null, ['class'=>'form-control', 'id' => 'city_select']) }}
                            </div>
                        </div>
                        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
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

                        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                        <a href="{{ route('admin.schools.index')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection