@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Subject</div>
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
                    {{ Form::open(['route' => ['admin.subjects.update', $subject->id], 'method' => 'put']) }}
                        <div class="form-group">
                            {!! Form::label('name', 'Subject Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', $subject->name, ['class'=>'form-control']) }}
                            </div>
                        </div>
                        {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                        <a href="{{ route('admin.subjects.index')}}">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection