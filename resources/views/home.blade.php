@extends('layouts.app')

@section('content')
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @if(Auth::user()->roles != 'customer')
                    <div>
                        <a class="btn btn-warning" href="/profile">profile</a>
                        <a class="btn btn-warning" href="/admin/products">products</a>
                        <a class="btn btn-warning" href="/admin/categories">categories</a>
                        <a class="btn btn-warning" href="/admin/users">users</a>
                    </div>
                @else
                    <div>
                        <a class="btn btn-warning" href="/profile">profile</a>
                        <a class="btn btn-warning" href="/products">products</a>
                        <a class="btn btn-warning" href="/orders">My Orders</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
