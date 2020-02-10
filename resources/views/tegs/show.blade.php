@extends('layouts.default')
@section('content')
<div class="row">

@if($teg->count()>0)


@foreach($teg->postb as $kay)

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{asset('image/'.$kay->img)}}" alt="...">
      <div class="caption">

      	<!--title-->
        <h3>	<a href="posts/{{$kay->id}}">
			{{$kay->title}}		
		        </a>
	    </h3>
        <p>{{str_limit(strip_tags($kay->body),50)}}	
</p>

	<p><i class="fas fa-calender"></i> 	{{$kay->created_at}}

<i class="fas fa-user"></i> 	
{{$kay->user->name}}
</p>
      </div>
    </div>
  </div>



@endforeach

@else
 <div class="alert alert-info">sorry not post</div>
@endif
</div>
@endsection