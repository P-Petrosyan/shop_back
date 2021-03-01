@extends('layouts.main')
@section('title','Products')
@section('content')
	<form action="profile/edit/{{{Auth::id()}}}" method="POST">

        @csrf
        <label >Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
        <label >New-password</label>
        <input type="password" name="newpassword" >

        <label >Old-password</label>
        <input type="password" name="oldpassword" >

        <input type="submit" class="btn btn-success" value="Modifie" >
    </form>
<div>

        <a href="/home" class="btn btn-warning"> back</a>
</div>

@endsection
