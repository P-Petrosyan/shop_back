@extends('layouts.main')
@section('title','Orders')
@section('content')

<h1>Orders Admin</h1>
<table style="border:1px solid green" class="table tabel-hover table-bordered">
	<tr>
		<th>Customer</th>
		<th>Date</th>
		<th>Product Name</th>
		<th>Price</th>
	</tr>
	@foreach($orderproducts as $orderproduct)
	<tr>
		<td>{{$orderproduct->order->user->name}}</td>
		<td>{{$orderproduct->order->submit_date}}</td>
		@if($orderproduct->product)
		<td>{{$orderproduct->product->name}}</td>
		@endif
		@if($orderproduct->product)
		<td>{{$orderproduct->product->price}}</td>
		@endif
		
	</tr>
	@endforeach
</table>

<a href="/home" class="btn btn-success"> back</a>
@endsection