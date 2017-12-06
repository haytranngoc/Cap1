@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of countries
                    <div class="pull-right"><a href="{{ route('admin.countries.create') }}"><button class="btn btn-xs btn-primary">Create new country</button></a></div>
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
                            @foreach($countries as $index => $country)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.countries.edit', ['id' => $country->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.countries.destroy', ['id' => $country->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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