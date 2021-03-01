@extends('layouts.main')
@section('title','Categories')
@section('content')

<h1>Categories Admin</h1>
<table style="border:1px solid green" class="table tabel-hover table-bordered">
	<tr>
		<th>Category ID</th>
		<th>Category Name</th>
		<th>Parent</th>
		<th colspan="2"> Action</th>
	</tr>
	@foreach($categories as $category)
	<tr>
		<td>{{$category->id}}</td>
		<td>{{$category->name}}</td>
		<td>
		@if(isset($category->parent))
			{{$category->parent->name}}
		@endif
		</td>
		<td>
			<a href="/admin/categories/edit/{{$category->id}}" class="btn btn-warning">edit</a>
		</td>
		<form method="post" action="/admin/categories/delete/{{$category->id}}">
			@csrf
			<td>
				<input type="submit" class="btn btn-danger" value="delete">
			</td>
		</form>
	
	</tr>
	@endforeach
</table>

<a href="/admin/categories/create" class="btn btn-success"> Create Category</a>
@endsection