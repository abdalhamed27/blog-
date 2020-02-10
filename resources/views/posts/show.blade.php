@extends('layouts.default')
@section('content')
{{$post->title}}

<div class="clearfix">
<div class="form-group">
@if(!Auth::guest() &&(Auth::user()->id == $post->user_id ))
<a href="{{$post->id}}/edit" class="btn btn-default">
	Edit Post
</a>
</div>comment: {{	$post->comment->count()}}
<div class="pull-right">
	{!!Form::open(['action'=>['post@destroy',$post->id]])!!}
{{Form::hidden('_method','DELETE')}}
<button class="btn btn-danger" type="submit">DELETE</button>
{!!Form::close()!!}	




</div>

{!! Form::open(['action'=>['CommentController@comment',$post->id]]) !!}
	<div  class="form-group">
	{{Form::textarea('comment','',['placeholder'=>'enter post title','class'=>'form-control ','cols'=>'30','rows'=>'10'])}}
	</div>


		<div  class="form-group">
	{{Form::submit('save',['class'=>'btn btn-primary'])}}
	</div>
{!! Form::close() !!}

</div>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>

  <!-- Table -->
  <table class="table">
  <tr>
  	<th>teg</th>
  	<th>commments</th>
  </tr>
  <tr>
  	@foreach($post->teg as $teg)
  	<td><a href="{{route('Tegs.show',$teg->id)}}">
{{$teg->teg}}</a></td>

  	@endforeach 
@foreach($post->comment as $come)

<td>{{$come->body}}</td>
@endforeach 
  </tr>
  </table>
</div> 
 

 
{{strip_tags($post->body)}}
@endif

@endsection