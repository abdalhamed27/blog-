<!DOCTYPE html>	
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{config('app.name','site')}}</title>
		<link href="https://stackpath.bootstrapcdn.com/bootswatch/3.4.1/cerulean/bootstrap.min.css", rel="stylesheet", integrity="sha384-S0cN63+vYrG1/kfcUhtXsKZfyE9azrjw5p+Q5yYU+Dzjg60sZUEYsIKIb5O/oaT3", crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{asset('css/all.css')}}">
						<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.css')}}">

	<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>


@include('elements.nav')

<div class="container">
	@include('elements.flash')
	@yield('content')
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"> </script>
<script type="text/javascript" src="{{asset('js/all.js')}}"> </script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@yield('java')
</script>
</body>
</html>