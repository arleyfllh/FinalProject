@extends('master')
@section('title','Show Anything')

@push('script-h')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

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
	<div class="card">
		<div class="row m-2 p-2 bg-white">
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
				<div>
					@foreach($questions->tag as $tag)
						<button class="btn btn-default btn-sm"> {{$tag->name}} </button>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	


	@include('question.answerq',['question_id'=>$questions->id])



	<div class="m-4">
		<form action=" {{route('answer.store')}} " method="POST">
			@csrf
			<div class="form-group">
				<label for="description">Your Answer:</label>
				<textarea name="description" class="form-control my-editor">{!! old('description', $description ?? '') !!}</textarea>
				<input type="hidden" name="question_id" value=" {{$questions->id}} ">
			</div>
			<button type="submit" class="btn btn-primary">Submit Answer</button>
		</form>
	</div>
</div>

@endsection

@push('script-b')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush