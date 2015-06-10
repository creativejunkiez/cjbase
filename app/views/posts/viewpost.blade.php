<?php
use Carbon\Carbon;
?>
@extends('layout.main')
@section('title',Config::get('settings.title'))
@section('body')
<?php 

?>
	<div class="row cover-image">
		<div class="container">
@if($userdel->header_img)
    <img width="1170" height="170" id="img" src="{{asset('headerimg')}}/{{$userdel->header_img}}"></img>
@else
    <img width="1170" height="170" id="img" src="{{asset('img/logo.png')}}"></img>
@endif			
		</div>
	</div>
	<br/>
	<div class="row profile-section">
		<div class="container">
			<div class="col-md-1 col-sm-2 col-xs-3 propic">
				@if($userdel->usr_img)
				    <img width="100" height="100" id="img" src="{{asset('uploads')}}/{{$userdel->header_img}}"></img>
				@else
				    <img width="100" height="100" id="img" src="{{asset('img/user.png')}}"></img>
				@endif
			</div>
			<div class="col-md-2 col-sm-2 col-xs-3 pro-name">
				<h3>{{$userdel->name}}</h3>
			</div>
			<div class="col-md-7 col-sm-6 col-xs-2"></div>
			<div class="col-md-2 col-sm-2 col-xs-4 social-links">
				<h4>Share this Page</h4>
				<a class="btn btn-social-icon btn-facebook" style="padding:1px;" href="{{$userdel->fb_link}}">
 							<i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
 						<a class="btn btn-social-icon btn-twitter" href="{{$userdel->tw_link}}">
 							<i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-12 activity-drafts">
				<ul class="nav nav-pills">
					<li class="active"><a href="{{ URL::route('view-post') }}">Posts</a></li>
					<li><a href="{{URL::route('activity')}}">Activity</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-8 col-sm-8">
				<div class="row launch-your-buzz">
					<div class="col-md-9">
						<h1>Launch Your Buzz</h1>
						<p>Use our new superlist posting interface and quickly create exceptional, media-rich buzz posts.</p>
					</div>
					<div class="col-md-3 start-posting-button">
					<form action = "{{ URL::route('add-post') }}" method = "get">
						<button type="submit" class="btn btn-info"> Start Posting </button>
					</form>
					</div>
				</div>
				<div class="row">
				<br/>
<div class="col-md-11 first-column">
<?php 

foreach ($postdis as $addlin) 
	{
		$postid = $addlin->id;
		$userid = $addlin->usr_id;
		$tit = $addlin->title;
		$url = $addlin->url;
		$credits = $addlin->credits;
		$des = $addlin->description;
		$headline = $addlin->headline;
		$thumbnail = $addlin->thumbnail;
		$time = $addlin->created_at;
		$time1 = new Carbon($time);

		$userdel = DB::table('users')->where('id',$userid)->first();
		
?>
				<div class="row post profile_view">
					<div class="col-md-4 post-img">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="200" height="120" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
					</div>
					<div class="col-md-8 post-content">
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}"><h3>{{$tit}}</h3></a>
						<h5>{{$headline}}</h5>
						<p><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}">&nbsp;{{$userdel->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> </p>
					</div>
				
				</div>


		<a href="{{ URL::Route('edit-post', $postid = $postid) }}" ><button type="button" class="btn btn-success"> edit this post </button></a> </br>
		<a href="{{ URL::Route('delete-post', $postid = $postid) }}" ><button type="button" class="btn btn-primary"> delete this post </button></a> </br></br></br></br>
<?php
	
	}
?>
</div>
</div>
</div>
			<div class="col-md-4 col-sm-4">
				<h4>This is a BuzzFeed user and their posts have not been vetted or endorsed by BuzzFeed's editorial staff. BuzzFeed Community is a place where anyone can post awesome lists and creations. Learn more or post your buzz!</h4>
				<br/>
			</div>
		</div>
	</div>

<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
</div>
@stop
	<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>	
