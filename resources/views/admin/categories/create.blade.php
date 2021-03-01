@extends('layouts.main')
@section('title','Categories Create')
@section('content')


	<h1>Create Category</h1>
	<form method="POST">
	@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Parent Category</label>

			<select name="parent_id">
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</div>
		
		
		<input type="submit" class="btn btn-success" value="Save">
	</form>

@endsection