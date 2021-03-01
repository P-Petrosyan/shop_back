@extends('layouts.main')
@section('title','Products')
@section('content')

<table style="border:1px solid green" class="table tabel-hover table-bordered">
	<tr>
		<th>User</th>
		<th>Product</th>
		<th>Count</th>
		<th>Price</th>

		<th colspan="2" >action</th>
	</tr>

	@php
		$totalC = 0;
		$totalP = 0;
	@endphp
	@foreach($baskets as $basket)
		<tr>
			<td>{{ $basket->user->name}}</td>
			<td>{{ $basket->product->name}}</td>
			<td >{{$basket->count}}</td>
			<td>
				@php
					$totalC += 1;
					$totalP +=$basket->product->price;
					// $thing.push($basket->product->price * $basket->count)
				@endphp
				{{$basket->product->price * $basket->count}}

			</td>
			<td>
				<a class="btn btn-danger" href="/baskets/delete/{{$basket->id}}">Delete</a>
			</td>
		</tr>
	@endforeach
		<tr>
			<th> Total</th>
			<td></td>
			<td>{{$totalC}}</td>
			<td>{{$totalP}}</td>
			<td></td>
		</tr>
		</table>

			<form action="/orders/add" method="POST">
				@csrf
				<input type="submit" value="Add To Order" class="btn btn-success">
			</form>
		<a class="btn btn-warning" href="/products">products</a>


@endsection
