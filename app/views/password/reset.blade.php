@extends('layout.news')
@section('title',Config::get('settings.title').'reset password')
@section('body')
<div class="row all-posts">
<div class="container">
<div class="col-md-4 first-column">
</br>
</br>
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
	<div class="input-group">
	  <span class="input-group-addon">Email</span>
	  <input type="text" class="form-control" placeholder="email" name="email">
	</div></br>
	<div class="input-group">
		<span class="input-group-addon">Password</span>
		<input type="password" class="form-control" placeholder="password" name="password">
	</div></br>
   <div class="input-group">
		<span class="input-group-addon">Password Again</span>
		<input type="password" class="form-control" placeholder="password_confirmation" name="password_confirmation">
	</div><br/><br>
    <input type="submit" class="btn btn-info" value="Reset Password">
</form>
@if(Session::has('error'))
	<h3>{{Session::get('error')}}</h3>
@else

@endif

</div>
</div>
</div>
<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
	<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
@stop
</body>
</hmtl>
