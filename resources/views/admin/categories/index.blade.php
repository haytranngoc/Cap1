@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Categories</h1>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($categories as $index => $category)
						<tr>
							<th>{{ $index + 1 }}</th>
							<td>{{ $category->name }}</td>
							<td class="text-right">
	                            <a href="{{ route('adminCategoriesDelete', ['id' => $category->id] ) }}" ><button class="btn btn-xs btn-danger">Delete</button></a>
	                        </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div> <!-- end of .col-md-8 -->

			<div class="col-md-3">
				<div class="well">
					{!! Form::open(['route' => 'adminCategoriesStore', 'method' => 'POST']) !!}
						<h2>New Category</h2>
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
						<br>
						{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection