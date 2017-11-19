@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of subjects
                    <div class="pull-right"><a href="{{ route('adminSubjectsCreate') }}"><button class="btn btn-xs btn-primary">Create new subject</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $index => $subject)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td class="text-right">
                                      <a href="{{ route('adminSubjectsEdit', ['id' => $subject->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                      <a href="{{ route('adminSubjectsDelete', ['id' => $subject->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection