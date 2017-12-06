@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Create Specialized</div>

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
                    {{ Form::open(['route'=>'admin.specializeds.store']) }}
                        <div class="form-group">
                            {!! Form::label('specialized_code', 'Specialized Code:') !!}
                            <div class="form-controls">
                                {{ Form::text('specialized_code', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Specialized Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('point', 'Point:') !!}
                            <div class="form-controls">
                                {{ Form::text('point', null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('branch_id', 'Branch') !!}
                            <div class="form-controls">
                                {!! Form::select('branch_id', $branches, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                        <a href="{{ route('admin.specializeds.index')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection