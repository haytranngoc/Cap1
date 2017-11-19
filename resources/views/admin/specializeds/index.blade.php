@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Specializeds
                    <div class="pull-right"><a href="{{ route('adminSpecializedsCreate') }}"><button class="btn btn-xs btn-primary">Create new specialized</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Specialized Code</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specializeds as $index => $specialized)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $specialized->specialized_code }}</td>
                                    <td>{{ $specialized->name }}</td>
                                    @if (!empty($specialized->branch))
                                    <td>{{ $specialized->branch->name }}</td>
                                    @endif
                                    <td class="text-right">
                                      <a href="{{ route('adminSpecializedsEdit', ['id' => $specialized->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                      <a href="{{ route('adminSpecializedsDelete', ['id' => $specialized->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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