@extends('layouts.default')

@section('content')

<div class="container">
  
<table>
    <tr>
        <th>title</th>

        <th>CREATE</th>

        <th>EDIT</th>

        <th>DELETE</th>

    </tr>
    <tr>
@foreach($postbs as $kay)
        <td>{{$kay->title}}</td>

       
@endforeach
    </tr>

</table>
             
</div>
@endsection
