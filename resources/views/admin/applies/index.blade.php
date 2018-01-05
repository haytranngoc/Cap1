@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of applies
                    <div class="pull-right"><a href="{{ route('admin.applies.create') }}"><button class="btn btn-xs btn-primary">Create new apply</button></a></div>
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
                            @foreach($applies as $index => $apply)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $apply->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.applies.edit', ['id' => $apply->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.applies.destroy', ['id' => $apply->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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