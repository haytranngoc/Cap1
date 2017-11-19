@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Branch</div>
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
                    {{ Form::open(['route' => ['adminBranchesUpdate', $branch->id], 'method' => 'put']) }}
                        <div class="form-group">
                            {!! Form::label('branch_code', 'Branch Code:') !!}
                            <div class="form-controls">
                                {{ Form::text('branch_code', $branch->branch_code, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Branch Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', $branch->name, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        
                        {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                        <a href="{{ route('adminBranches')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection