@extends('layouts.app')
@section('title', 'Posts')
@section('content')
	<div class="container">
		{{-- row --}}
		<div class="row justify-content-center mt-3">
			{{-- col-md-9 --}}
			<div class="col-md-9">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
						
						<p class="text-danger font-weight-bold">{{$post->category->name}}</p>
						<h4 class="text-dark font-weight-bold">{{$post->title}}</h4><hr>
						@if(isset($post->image))
						<div class="image">
							<img src="{{asset('storage/uploads/'.$post->image)}}" class="img-thumbnail w-100">
						</div><br>
						@endif
						<p>By   <span class="text-primary font-weight-bold">{{$post->user->name}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>{{\Carbon\Carbon::parse($post->created_at)->format('d M, Y')}}</span></p>
						<p style="line-height: 30px;">{{$post->description}}</p>
						<p><a href="{{route('delete', $post->id)}}" class="btn btn-danger">DELETE</a> <a href="{{route('edit', $post->id)}}" class="btn btn-success">EDIT</a> <a href="{{route('posts')}}" class="btn btn-secondary float-right">Back</a></p>

					</div>
					{{-- end card-body --}}
				</div>
				{{-- end card --}}
			</div>
			{{-- end col-md-9 --}}
		</div>
		{{-- end row --}}
	</div>
@endsection