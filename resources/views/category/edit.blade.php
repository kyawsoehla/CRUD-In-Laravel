@extends('layouts.app')
@section('title', 'Edit_Category')
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
					<form method="POST" action="{{route('category_update', $category->id)}}">
						@csrf
					  {{-- category --}}
					  <div class="form-group">
					    <label>Category</label>
					    <input type="text" class="form-control" name="name" value="{{$category->name}}">
					  </div>
					  {{-- end category --}}
					  
					  
					  <button type="submit" class="btn btn-primary">Add Category</button>
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