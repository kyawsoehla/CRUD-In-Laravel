@extends('layouts.app')
@section('title', 'Edit_Post')
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
					<form method="POST" action="{{route('update', $post->id)}}" enctype="multipart/form-data">
						@csrf
					  {{-- title --}}
					  <div class="form-group">
					    <label>Title</label>
					    <input type="text" class="form-control" name="title" value="{{$post->title}}" >
					  </div>
					  {{-- end title --}}
					  {{-- title --}}
					  <div class="form-group">
					    <label>Category</label>
					    <select class="form-control" name="category">
					    	@foreach($categories as $category)
					    	<option value="{{$category->id}}" {{($category->id==$post->category->id)?'selected':null}}>
					    		{{$category->name}}
					    	</option>
					    	@endforeach
					    </select>
					  </div>
					  {{-- end title --}}
					  {{-- title --}}
					  <div class="form-group">
					    <label>Description</label>
					    <textarea name="description" class="form-control" rows="10">{{$post->description}}</textarea>
					  </div>
					  {{-- end title --}}
					  {{-- file --}}
					  <div class="form-group">
					    <label>Image</label>
					    <input type="file" class="form-control" name="image" >
					    @error('image')
					    	<div class="text-danger font-weight-bold">{{$message}}</div>
					    @enderror
					  </div>
					  {{-- end file --}}
					  <button type="reset" class="btn btn-danger">R E S E T</button>
					  <button type="submit" class="btn btn-primary">P O S T</button>
					</form>
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