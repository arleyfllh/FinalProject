@extends('master')
@section('title','Show Anything')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Check</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container">
	<div class="row m-2 p-2 bg-white" style="border: 1px solid black;">
		<div class="col-md-1" style="text-align: center;">
			<div class="mt-3">
				<button class="btn btn-success mb-2"><i class="far fa-thumbs-up"></i></button>
				<button class="btn btn-danger"><i class="far fa-thumbs-down"></i></button>
			</div>
			
		</div>
		<div class="col-md mt-2">
			<h6> {{$questions->user->name}} </h6>
			<h4> {{$questions->title}} </h4>
			<p> {!! $questions->description !!} </p>
		</div>
		<div>
			<form>
				
			</form>
		</div>
	</div>
</div>

@endsection