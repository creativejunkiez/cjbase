
@extends('layout.news')
@section('title',Config::get('settings.title').'login')
@section('body')
<link href="{{ asset('css/loginstyle.css')}}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
	<br>
	
	<br>
	<br>
	<br>
<div class="row">
	<div class="container">
	<div class="col-md-7">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		
			<br>
			<br>
		</br>
		    <a class="btn btn-block btn-social btn-google-plus" href="{{ URL::Route('account-google') }}">
    			<i class="fa fa-google-plus"></i> Sign in with google+
 			</a>
 			<br>
		    <a class="btn btn-block btn-social btn-facebook" href="{{ URL::Route('account-fbcreate') }}">
    			<i class="fa fa-facebook"></i> Sign in with facebook
    		</a>
		</div>
	</div>
    
      <h1>Sign In</h1>
      <br>
		<form action="{{URL::route('account-sign-in-post')}}" class="form" method="post">
		   <div class = "col-md-4">
		   		<div class="input-group">
				  <span class="input-group-addon">Email</span>
				  <input type="text" class="form-control" placeholder="email" name="email">
				</div>
				{{$errors->first('email')}}
				<br>
				<div class="input-group pas">
				  <span class="input-group-addon">password</span>
				  <input type="password" class="form-control" placeholder="password" name="password">
				</div>
				{{$errors->first('password')}}
				<br>
				
				  <input type="submit" class = "btn btn-success" value="Sign In" />
				
		  </div>
		</form>
	</div>
</div>

	<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>


@stop
</body>
</html>