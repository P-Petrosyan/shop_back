@extends('layouts.main')
@section('title','Users Edit')
@section('content')

	
	<h1>Edit User</h1>
<form method="POST">
	@csrf
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" value="{{$user->name}}" class="form-control">
	</div>
	<div class="form-group">
		<label>Role</label>
		<!-- <input type="text" name="roles" value="{{$user->roles}}" class="form-control"> -->
		<select name="roles">
		@foreach($roles as $role)
		<!-- dd($role) -->
			<option value="{{$role->roles}}"
			@if($role->roles == $user->roles)
			selected=""
			@endif
			>{{$role->roles}}</option>
		@endforeach
		</select>
	</div>

	<input type="submit" class="btn btn-success" value="Save">
</form>




@endsection