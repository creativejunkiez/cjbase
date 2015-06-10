<?php
use Carbon\Carbon;
?>
@extends('layout.news')
@section('title',Config::get('settings.title').'search')
@section('body')
<div class="row top-slider" id="postswrapper">
<div class="container">
<?php
$post1 = array_chunk($listpost, 3);

//dd($post1[1]);
foreach ($post1 as $post_chk) 
{
?>
		<div class="col-md-4 col-sm-12 col-xs-12 part-1">
				<div class="row">
<?php

foreach ($post_chk as $addlin) 
{

		$postid = $addlin->id;
		$tit = $addlin->title;
		$url = $addlin->url;
		$credits = $addlin->credits;
		$des = $addlin->description;
		$headline = $addlin->headline;
		$thumbnail = $addlin->thumbnail;
		$out = strlen($tit) > 50 ? substr($tit,0,50)."..." : $tit;
?>
					<div class="col-md-4 col-sm-4 col-xs-4 top-slider-image" id="loadmoreajaxloader">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="115" height="85" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img></a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
						<div class="top-slider-image-caption">
							<p><a href="{{ URL::route('postdata', array('postid' => $postid)) }}" > {{$out}}</a></p>
						</div>
					</div>
<?php }
 ?>
		
				</div>
			</div>
<?php } ?>	
		</div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-6">
			<div class="row">
				<h2>Search Results</h2>
<?php 

foreach ($details as $addlin) 
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
				<div class="row post">
					<div class="col-md-3 col-sm-12 post-img">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="175" height="130" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
					</div>
					<div class="col-md-9 col-sm-12 post-content">
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}"><h3>{{$tit}}</h3></a>
						<h5>{{$headline}}</h5>
						<p><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}">&nbsp;{{$userdel->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> </p>
					</div>
				
				</div>
<?php } ?>
</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6 po-img">
<?php foreach ($postdis as $addlin) 
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
				<div class="row" >
					<div class="col-md-12">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="330" height="200" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
					</div>
					<div class="col-md-12">
						<h4><a href="#">{{ $tit }}</a></h4>
						<p><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}"> {{$userdel->name}} </a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> </p>
					</div>
				</div>
<?php } ?>
</div>
</div>
</div>
<br/>
<br/>
@if(Session::has('msg'))
	{{Session::get('msg')}}
@else

@endif
<br/>
@if(Session::has('msg1'))
	{{Session::get('msg1')}}
@else

@endif

<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
</div>
	<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
@stop