@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of schools
                    <div class="pull-right"><a href="{{ route('admin.schools.create') }}"><button class="btn btn-xs btn-primary">Create new school</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country Name</th>
                                <th>City Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $index => $school)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->city->country->name }}</td>
                                    <td>{{ $school->city->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.schools.edit', ['id' => $school->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.schools.destroy', ['id' => $school->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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