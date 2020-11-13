@extends('layouts.app')
@section('title', 'Profile')
@section('content')
	<div class="container">
		<h1 class="text-danger text-center font-weight-bold">{{Auth::user()->name}}</h1>
		@foreach($posts as $post)
		{{-- row --}}

		<div class="row justify-content-center mt-3">
			{{-- col-md-9 --}}
			<div class="col-md-9">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">

						<p class="text-danger font-weight-bold">{{$post->category->name}}</p>
						<a href="{{route('show', $post->id)}}" class="font-weight-bold text-dark hover" style="font-size: 22px; text-decoration: none;">{{$post->title}}</a><hr>
						@if(isset($post->image))
						<div class="image">
							<img src="{{asset('storage/uploads/'.$post->image)}}" class="img-thumbnail w-100">
						</div><br>
						@endif
						<p>By   <span class="text-primary font-weight-bold">{{$post->user->name}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>{{\Carbon\Carbon::parse($post->created_at)->format('d M, Y')}}</span></p>
						<p>{{str_limit($post->description, $limit=300, $end='...')}}</p>
						<p><a href="{{route('delete', $post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">DELETE</a> <a href="{{route('edit', $post->id)}}" class="btn btn-success">EDIT</a><a href="{{route('show', $post->id)}}" class="btn btn-outline-dark float-right">View Details</a></p>

					</div>
					{{-- end card-body --}}
				</div>
				{{-- end card --}}
			</div>
			{{-- end col-md-9 --}}
		</div>
		{{-- end row --}}
		
		@endforeach

		<div class="row justify-content-center mt-3">
			<div class="col-md-9">
				{{$posts->links()}}
			</div>
		</div>
	</div>
@endsection