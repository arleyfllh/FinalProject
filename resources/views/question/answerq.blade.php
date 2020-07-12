@foreach($questions->answer as $answer)
	<div class="card" style="width: 800px; margin-left: 100px">
		<div class="card-header">
			{{$answer->user->name}}
		</div>
		
		<div class="card-body">
			{!! $answer->description !!}
		</div>
	</div>



@endforeach