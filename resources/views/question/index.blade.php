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
		<div class="row">
			<div class="col-md-3 mt-4">
				<a class="upvote">
					<i class="fa fa-thumbs-o-up"></i>
					
				</a>
				<a class="downvote">
					<i class="fa fa-thumbs-o-down"></i>
					
				</a>
			</div>
			<div class="col-md-6">
				<h5> {{$question->user->name}} </h5>
				<h4> {{$question->title}} </h4>
				<p> {!! $question->description !!} </p>
			</div>
			<div class="col-md-3">
				<div class="btn-group">
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
	@endforeach
</div>

@endsection