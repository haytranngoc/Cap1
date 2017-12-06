@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Canidates
                    <div class="pull-right"><a href="{{ route('admin.candidates.create') }}"><button class="btn btn-xs btn-primary">Create new candidate</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <div class="pull-left" style="padding-right: 2px;"><a href="{{ route('admin.candidates.showConfirmed') }}"><button class="btn btn-xs btn-primary">List of Confirmed</button></a></div>
                        <div class="pull-left"><a href="{{ route('admin.candidates.showUnconfirmed') }}"><button class="btn btn-xs btn-primary">List of Unconfirmed</button></a></div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Create At</th>

                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="/uploads/avatars/{{ $item->avatar }}" style="width:50px; height:50px; float:left; border-radius:50%;" ></td>
                                    <td>{{ $item->getFullName() }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-right">
                                        <a href="{{ route("admin.candidates.show", $item->id) }}"><button class="btn btn-xs btn-success">View</button></a>
                                        <a href="{{ route('admin.candidates.edit', ['id' => $item->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.candidates.destroy', ['id' => $item->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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