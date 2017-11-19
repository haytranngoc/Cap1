@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Canidates
                    <div class="pull-right"><a href="{{ route('adminCandidatesCreate') }}"><button class="btn btn-xs btn-primary">Create new candidate</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Full Name</th>
                                <th>Email</th>

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
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->date_of_birth }}</td>
                                    <td class="text-right">
                                        <a href="{{ route("adminCandidatesShow", $item->id) }}"><button class="btn btn-xs btn-success">View</button></a>
                                        <a href="{{ route('adminCandidatesEdit', ['id' => $item->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('adminCandidatesDelete', ['id' => $item->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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