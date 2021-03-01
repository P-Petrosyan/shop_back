@extends('layouts.main')
@section('title','Products')
@section('content')



	<table style="border:1px solid green" class="table tabel-hover table-bordered">
		<tr>
			<th>name</th>
			<th>image</th>
			<th>description</th>
			<th>price</th>
			<th>Category</th>
			<th>action</th>
		</tr>
		@foreach($products as $product)
		<form method="POST" action="/baskets/add/{{$product->id}}">
			@csrf
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
					<input type="submit" class="btn btn-success" value="Add to Basket">
				</td>
			</tr>
		</form>
		@endforeach
	</table>
	@if(!isset($a))
		{{--@dd('asdasd');--}}
		{{--@dd(Request::url());--}}
		{{--@dd($products->links());--}}
		<div class="d-flex justify-content-center paginator">
			{!! $products->links() !!}
		</div>
	@endif
	{{--@if($products->links() )--}}
	{{--<div class="d-flex justify-content-center paginator">--}}
    	{{--{!! $products->links() !!}--}}
	{{--</div>--}}
	{{--@endif--}}
	<a class="btn btn-success" href="/baskets">Basket</a>
	<a class="btn btn-warning" href="/profile">profile</a>



@endsection

<style>
	.paginator .hidden {
		display: none;
	}
	body{
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover
		/*background-color: #000;*/
	}
</style>
