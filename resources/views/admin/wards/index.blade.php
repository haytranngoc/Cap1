@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of wards
                    <div class="pull-right"><a href="{{ route('adminWardsCreate') }}"><button class="btn btn-xs btn-primary">Create new ward</button></a></div>
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
                            @foreach($wards as $index => $ward)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ward->name }}</td>
                                    <td>{{ $ward->city->country->name }}</td>
                                    <td>{{ $ward->city->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('adminWardsEdit', ['id' => $ward->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('adminWardsDelete', ['id' => $ward->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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