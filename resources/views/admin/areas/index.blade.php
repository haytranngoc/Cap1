@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of areas
                    <div class="pull-right"><a href="{{ route('admin.areas.create') }}"><button class="btn btn-xs btn-primary">Create new area</button></a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Bonus Point</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $index => $area)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->bonus_point }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.areas.edit', ['id' => $area->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.areas.destroy', ['id' => $area->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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