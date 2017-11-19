@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Candidate Type</div>
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
                    {{ Form::open(['route' => ['adminCandidateTypesUpdate', $candidateType->id], 'method' => 'put']) }}
                        <div class="form-group">
                            {!! Form::label('name', 'Candidate Type Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', $candidateType->name, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('bonus_point', 'Bonus Point:') !!}
                            <div class="form-controls">
                                {{ Form::text('bonus_point', $candidateType->bonus_point, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                        <a href="{{ route('adminCandidateTypes')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection