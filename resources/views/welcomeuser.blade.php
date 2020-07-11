@extends('master')

@section('title','BanyakTanya.com')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">Welcome To BanyakTanya.com!</div>
		<div class="card-body">Our Beloved User, {{Auth::user()->name}} </div>
	</div>
</div>
@endsection