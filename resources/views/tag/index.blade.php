@extends('master')
@section('title','List Tag')


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tags</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="card m-4 p-2">
	<table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">No.</th>
        <th>Tag Name</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($tags as $key=>$tag)
      <tr>
        <td> {{$key+1}} </td>
        <td> {{$tag->name}} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection