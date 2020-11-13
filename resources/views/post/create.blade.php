@extends('layouts.app')
@section('title', 'Create_Posts')
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
					<form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
						@csrf
					  {{-- title --}}
					  <div class="form-group">
					    <label>Title</label>
					    <input type="text" class="form-control" name="title"  value="{{old('title')}}">
					    @error('title')
					    	<div class="text-danger font-weight-bold">{{$message}}</div>
					    @enderror
					  </div>
					  {{-- end title --}}
					  {{-- category --}}
					  <div class="form-group">
					    <label>Category</label>
					    <select class="form-control" name="category">
					    	@foreach($categories as $category)
					    	<option value="{{$category->id}}" {{($category->id==old('category'))?'selected':null}}>
					    		{{$category->name}}
					    	</option>
					    	@endforeach
					    </select>
					    @error('category')
					    	<div class="text-danger font-weight-bold">{{$message}}</div>
					    @enderror
					  </div>
					  {{-- end category --}}
					  {{-- description --}}
					  <div class="form-group">
					    <label>Description</label>
					    <textarea name="description" class="form-control" rows="10">{{old('description')}}</textarea>
					    @error('description')
					    	<div class="text-danger font-weight-bold">{{$message}}</div>
					    @enderror
					  </div>
					  {{-- end description --}}
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