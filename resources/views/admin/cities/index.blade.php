@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of cities
                    <div class="pull-right"><a href="{{ route('adminCitiesCreate') }}"><button class="btn btn-xs btn-primary">Create new city</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $index => $city)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $city->name }}</td>
                                    @if (!empty($city->country))
                                    <td>{{ $city->country->name }}</td>
                                    @endif
                                    <td class="text-right">
                                      <a href="{{ route('adminCitiesEdit', ['id' => $city->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                      <a href="{{ route('adminCitiesDelete', ['id' => $city->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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