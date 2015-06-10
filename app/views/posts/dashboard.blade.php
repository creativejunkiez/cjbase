<?php
use Carbon\Carbon;
?>
@extends('layout.main')
@section('title',Config::get('settings.title'))
@section('body')
	<div class="row profile-section">
		<div class="container">
			<div class="col-md-1 propic">
				@if($userdel->usr_img)
				    <img width="100" height="100" id="img" src="{{asset('uploads')}}/{{$userdel->header_img}}"></img>
				@else
				    <img width="100" height="100" id="img" src="{{asset('img/logo.png')}}"></img>
				@endif
			</div>
			<div class="col-md-2 pro-name">
				<h3>{{$userdel->name}}</h3>
			</div>
			<div class="col-md-7"></div>
		
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-12 activity-drafts">
				<ul class="nav nav-pills">
					<li class="active"><a href="#">Posts</a></li>
					
				</ul>
			</div>
		</div>
	</div>
	<br>
	<br>
<div class="row all-posts">
<div class="container">
<div class="col-md-8 first-column">
	<h3>Number of posts {{$count}}</h3>
	<br><br>
<?php
	
	$count = 0;
	foreach ($postdel as $addlin) 
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
		$count = $count + 1;
?>
					<div class="col-md-4 col-sm-4 post-img">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="175" height="90" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
					</div>

					<div class="col-md-9 col-sm-12 post-content">
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}"><h3>{{$tit}}</h3></a>
						<h5>{{$headline}}</h5>
						<p><span class="post-creator"><i class="icon-user"></i><a href="#"> {{$userdel->name}}</a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> <span class="post-responses"></span></p>
					</div>

				
<?php } ?>
</div>
</div>
</div>
<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
	<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

@stop