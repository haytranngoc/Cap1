@extends('layouts.admin')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')
	<div class="container">
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@if(!empty($post->image))
					<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
				@endif
				<h1>{{ $post->title }}</h1>
				<p>{!! $post->body !!}</p>
				<hr>
				<p>Posted In: {{ $post->category->name }}</p>
			</div>
		</div>
	</div>

@endsection