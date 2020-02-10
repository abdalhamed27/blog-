<!DOCTYPE html>
<html>
<head>
	<title>email</title>
</head>
<body>
<h1>Hi admin</h1>

<h3>do you have form {{$user->name}}</h3>
<a href="{{url('user/verfiyed',$user->verify_user->token)}}">verfiy</a>

<h3>Email{{$user->email}}</h3>

</body>
</html>