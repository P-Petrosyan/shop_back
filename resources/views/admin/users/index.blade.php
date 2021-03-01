@extends('layouts.main')
@section('title','Users')
@section('content')

<h1>Users Admin</h1>
<table style="border:1px solid green" class="table tabel-hover table-bordered">
	<tr>
		<th>User Name</th>
		<th>Role</th>
		<th colspan="2">Action</th>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>{{$user->name}}</td>
		<td>{{$user->roles}}</td>
		<td>
			<a href="/admin/users/edit/{{$user->id}}" class="btn btn-warning">edit</a>
		</td>
		<form method="post" action="/admin/users/delete/{{$user->id}}">
			@csrf
			<td>
				<input type="submit" class="btn btn-danger" value="delete">
			</td>
		</form>
	</tr>
	@endforeach
</table>


@endsection