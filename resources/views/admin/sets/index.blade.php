@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of sets
                    <div class="pull-right"><a href="{{ route('admin.sets.create') }}"><button class="btn btn-xs btn-primary">Create new set</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subject Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sets as $index => $set)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $set->name }}</td>
                                    <td>
                                        @foreach ($set->subjects as $subject)
                                            <span class="label label-default">{{ $subject->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.sets.edit', ['id' => $set->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.sets.destroy', ['id' => $set->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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