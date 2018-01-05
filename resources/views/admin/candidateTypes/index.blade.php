@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Candidate Type
                    <div class="pull-right"><a href="{{ route('admin.candidateTypes.create') }}"><button class="btn btn-xs btn-primary">Create new Candidate Type</button></a></div>
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
                            @foreach($candidateTypes as $index => $candidateType)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $candidateType->name }}</td>
                                    <td>{{ $candidateType->bonus_point }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.candidateTypes.edit', ['id' => $candidateType->id] ) }}"><button class="btn btn-xs btn-primary">Edit</button></a>
                                        <a href="{{ route('admin.candidateTypes.destroy', ['id' => $candidateType->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
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