@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of branches
                    <div class="pull-right"><a href="{{ route('admin.branches.create') }}"><button class="btn btn-xs btn-primary">Create new branch</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Code</th>
                                <th>Name</th>
                                <th>Subject Set</th>
                                <th>Point</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $index => $branch)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $branch->branch_code }}</td>
                                    <td>{{ $branch->name }}</td>
                                    
                                    <td>
                                        @foreach ($branch->sets as $set)
                                            <span class="label label-default">{{ $set->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $branch->point }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.branches.edit', ['id' => $branch->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.branches.destroy', ['id' => $branch->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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