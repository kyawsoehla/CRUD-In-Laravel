@extends('layouts.app')
@section('title', 'Posts')
@section('content')
	<div class="container">
		@if(session('success'))
			<div class="alert alert-success text-center text-danger font-weight-bold" style="font-size: 20px">	
					{{session('success')}}
			</div>	
		@endif
		{{-- row --}}
		<div class="row equal justify-content-center mt-3">
			{{-- col-md-9 --}}
			@foreach($posts as $post)
			<div class="col-md-6 d-flex">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
						<p class="text-danger font-weight-bold">{{$post->category->name}}</p>
						<div class="card-title"><a href="{{route('show', $post->id)}}" class="font-weight-bold text-dark hover" style="font-size: 22px; text-decoration: none;">{{$post->title}}</a><hr></div>
						@if(isset($post->image))
						<div class="image">
							<img src="{{asset('storage/uploads/'.$post->image)}}" class="img-thumbnail m-100" style="height: 200px;width: 100%">
						</div><br>
						@endif
						<p>By   <span class="text-primary font-weight-bold">{{$post->user->name}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>{{\Carbon\Carbon::parse($post->created_at)->format('d M, Y')}}</span></p>
						<p style="line-height: 30px;">{{str_limit($post->description, $limit=300, $end='...')}}</p>
						<div class="mt-4">	
						<p><a href="{{route('delete', $post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">DELETE</a> <a href="{{route('edit', $post->id)}}" class="btn btn-success">EDIT</a><a href="{{route('show', $post->id)}}" class="btn btn-outline-dark float-right">View Details</a></p>
						</div>

					</div>
					{{-- end card-body --}}
				</div>
				{{-- end card --}}
			</div>
			@endforeach
			{{-- end col-md-9 --}}
		</div>
		{{-- end row --}}
		
		

		<div class=" mt-3">
			<div >
				{{$posts->links()}}
			</div>
		</div>
	</div>
@endsection