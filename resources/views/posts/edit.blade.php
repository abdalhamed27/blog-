@extends('layouts.default')
@section('content')
<h1>Edit new post</h1>
<hr>
{!! Form::open(['action'=>['post@update',$post->id],'files'=>true]) !!}
{{Form::hidden('_method','PUT')}}
	<div  class="form-group">

	{{Form::label('title')}}
	{{Form::text('title',$post->title,['placeholder'=>'enter post title','class'=>'form-control'])}}
	</div>

	<div  class="form-group">
	{{Form::label('tegs')}}
<select name="tegs[]" class="tegs form-control" multiple >
	@foreach($tegs as $te)
<option value="{{$te->id}}">{{$te->teg}}</option>
	@endforeach
</select>
	</div>
		<div  class="form-group">
	{{Form::label('Body')}}
	{{Form::textarea('body',strip_tags($post->body),['placeholder'=>'enter post body','class'=>'form-control ckeditor '])}}
	</div>
		<div  class="form-group">
	{{Form::label('img')}}
	{{Form::file('img',['placeholder'=>'enter post title','class'=>'form-control '])}}
	</div>
		<div  class="form-group">
	{{Form::submit('save',['class'=>'btn btn-primary'])}}
	</div>
{!! Form::close() !!}
@endsection
@section('java')
<script type="text/javascript">
$(document).ready(function() {
    $('.tegs').select2().val({!! json_encode($post->teg()->pluck('id')) !!}).trigger('change');
});
</script>
@endsection