@extends('layouts.main')
@section('title','Products')
@section('content')

<h1>Products Admin</h1>
	<table style="border:1px solid green" class="table tabel-hover table-bordered">
		<tr>
			<th>name</th>
			<th>image</th>
			<th>description</th>
			<th>price</th>
			<th>Category</th>
			<th colspan="2" >action</th>
		</tr>
		@foreach($products as $product)
		<tr>
			<td>{{$product->name}}</td>
			<td><img src="{{ asset('/storage/images/products/'.$product->image )}}" width="60px" alt="image"></td>
			<td>{{$product->short_description}}</td>
			<td>{{$product->price}}</td>
			<td>
				<ul>

					@foreach($product->categories as $category)
						<li>{{$category->name}}</li>
					@endforeach

				</ul>
			</td>

				<td>
					<a href="/admin/products/edit/{{$product->id}}" class="btn btn-warning">edit</a>
				</td>
			<form method="post" action="/admin/products/delete/{{$product->id}}">
				@csrf
				<td>
					<input type="submit" class="btn btn-danger" value="delete">
				</td>
			</form>
		</tr>
		@endforeach
	</table>
	<div class="d-flex justify-content-center paginator">
    	{!! $products->links() !!}
	</div>

	<a href="/admin/products/create" class="btn btn-success"> Create Product</a>

@endsection

<style>
	.paginator .hidden {
		display: none;
	}
</style>
