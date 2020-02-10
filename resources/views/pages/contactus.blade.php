@extends('layouts.default')
@section('content')

<h1>Contact Us</h1>
<hr>
{!! Form::open(['action'=>'pr@desend']) !!}
	<div  class="form-group">
	{{Form::label('name')}}
	{{Form::text('name','',['placeholder'=>'enter name','class'=>'form-control '])}}
	</div>
	
		<div  class="form-group">
	{{Form::label('Email')}}
	{{Form::text('Email','',['placeholder'=>'enter  Email','class'=>'form-control '])}}
	</div>

		<div  class="form-group">
	{{Form::label('subject')}}
	{{Form::text('subject','',['placeholder'=>'enter  Email','class'=>'form-control '])}}
	</div>
		<div  class="form-group">
	{{Form::label('Body')}}
	{{Form::textarea('body','',['placeholder'=>'enter  body','class'=>'form-control   '])}}
	</div>
		<div  class="form-group">
	{{Form::submit('send',['class'=>'btn btn-primary'])}}
	</div>
{!! Form::close() !!}
@endsection