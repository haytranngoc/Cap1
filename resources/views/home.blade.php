@extends('layouts.app')
<style>
.box {
	display: inline-block;
	width: calc(100% / 3 - 12px);
	bottom: 24px;

}
.img{
	width: 130px;
    height: 100%;
    object-fit: cover;
}
</style>
@section('content')
<div class="container">
	
    <div class="row">

        @foreach ($posts as $post)
		<div class="box">
			<a href="{{ route('blog.single', $post->slug) }}"><img src="https://loremflickr.com/320/240" alt=""></a>
			<p><b>{{ $post->title }}</b></p>
			{{-- <p>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</p> --}}

			{{-- <p>{{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p> --}}
		</div>
		@endforeach
    </div>

</div>


@endsection
