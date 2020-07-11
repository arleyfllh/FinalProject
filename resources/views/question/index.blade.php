@extends('master')
@section('title','Ask Anything')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Questions</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container">
	@foreach($questions as $question)
		<div class="row m-2 p-2 bg-white" style="border: 1px solid black;">
			<div class="col-md-1" style="text-align: center;">
				<div class="mt-3">
					<button class="btn btn-success mb-2"><i class="far fa-thumbs-up"></i></button>
					<button class="btn btn-danger"><i class="far fa-thumbs-down"></i></button>
				</div>
				
			</div>
			<div class="col-md mt-2">
				<h6> {{$question->user->name}} </h6>
				<h4> {{$question->title}} </h4>
				<p> {!! $question->description !!} </p>
			</div>
			<div class="col-md-3" style="text-align: center;">
				<div class="mt-3">
					<div class="btn-group mt-4">
						<a href="/question/{{$question->id}}" class="btn btn-primary">
							Comment
						</a>
						@if ($question->user_id == Auth::id())
							<a href="/question/{{$question->id}}/edit" class="btn btn-success">
								Edit
							</a>
							<form action="/question/{{$question->id}}" method="POST">
	        		@csrf
	        		@method('DELETE')
		        		<button type="submit" class="btn btn-danger" > <i class="fas fa-trash"></i> </button>
		        	</form>
						@endif
					</div>
				</div>
				
			</div>
		</div>
	@endforeach
</div>

@endsection