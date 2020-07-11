@extends('master')

@section('title','Ask')

@push('script-h')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
@if(count($errors)>0)
	<div class="alert alert-danger">
		<strong>Waduh!</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li> {{$error}} </li>
			@endforeach
		</ul>
	</div>
@endif

<div class="m-3">
	<form action="/question" method="POST">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
  		<input type="text" class="form-control" name="title" placeholder="Title's Name" id="title">
		</div>
		<div class="form-group">
			<label for="description">Question</label>
  		<textarea name="description" class="form-control my-editor">{!! old('description', $description ?? '') !!}</textarea>
		</div>
		<div class="form-group">
			<label for="tags">Tags</label>
  		<input type="text" class="form-control" name="tags" placeholder="tags" id="tags">
		</div>
		<button class="btn btn-primary">Submit</button>
	</form>
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