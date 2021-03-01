@extends('layouts.main')
@section('title','Categories Edit')
@section('content')

	
	<h1>Edit Categories</h1>
	<form method="POST">
	@csrf

		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="{{$category1->name}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Parent Category</label>

			<select name="parent_id">
			@foreach($categories as $category)
				<option value="{{$category->id}}"
					@if($category->id == $category1->parent_id)
						selected=""
					@endif
				>{{$category->name}}</option>
			@endforeach
			</select>
		</div>
		
		<input type="submit" class="btn btn-success" value="Save">
	</form>
	
@endsection