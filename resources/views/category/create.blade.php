@extends('layouts.app')
@section('title', 'Create_Category')
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
					<form method="POST" action="{{route('category_store')}}">
						@csrf
					  {{-- category --}}
					  <div class="form-group">
					    <label>Category</label>
					    <input type="text" class="form-control" name="name" >
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


	{{-- Show Categories --}}
		{{-- row --}}
	<div class="row justify-content-center mt-3">
		{{-- col-md-9 --}}
		<div class="col-md-9">
			{{-- card --}}
			<div class="card">
				{{-- card-body --}}
				<div class="card-body">
					<table class="table table-hover">
						{{-- table header --}}
						<thead>
							<tr class="text-danger font-weight-bold">
								<td>No</td><td>Name</td><td>Created_at</td><td>Action</td>
							</tr>
						</thead>
						{{-- end table header --}}
						{{-- table body --}}
						<tbody>
							@foreach($categories as $key=>$category)
							<tr>
								<td>{{++$key}}</td><td>{{$category->name}}</td><td>{{\Carbon\Carbon::parse($category->created_at)->format('d-m-Y')}}</td><td><a href="{{route('del', $category->id)}}" onclick="return confirm('Are you sure to delete?')">Delete</a> <a href="{{route('category_edit', $category->id)}}">Edit</a></td>
							</tr>
							@endforeach
						</tbody>
						{{-- end table body --}}

					</table>
					
				</div>
				{{-- end card-body --}}
			</div>

			{{-- end card --}}
		</div>
		{{-- end col-md-9 --}}
		
	</div>
	<div class="row justify-content-center mt-3">
						<div class="col-md-9">
							{{$categories->links()}}
						</div>
					</div>
	{{-- end row --}}
	{{-- end Show Categories --}}
</div>

@endsection