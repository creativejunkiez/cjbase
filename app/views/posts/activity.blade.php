<?php
use Carbon\Carbon;
?>
@extends('layout.main')
@section('title',Config::get('settings.title'))
@section('body')
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
					<li class="active"><a href="{{ URL::route('view-post') }}">Posts</a></li>
					<li><a href="{{URL::route('activity')}}">Activity</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-8">
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
			</div>
			</div>


	<br>
	<br>
<div class="row all-posts">
<div class="container">
<div class="col-md-8 first-column">
<?php
	$lollike = null;
	$winlike = null;
	$omglike = null;
	$cutelike = null;
	$faillike = null;
	$trashylike = null;
	$wtflike = null;
	$trendlike = null;
	$title = null;
	$usrid = $userdel->id;
	$username = $userdel->name;

	foreach ($postlike as $likes) 
		{
			$arrayName = null;
			$postid = $likes->post_id;
			//dd($postid);
			$posttit = DB::table('posts')->where('id',$postid)->first();
			//dd($posttit);
			$likerow = DB::table('postlinks')->where('post_id',$postid)->where('usr_id', $usrid)->get();
			foreach ($likerow as $addlin) 
			{
			
				$id = $addlin->id;
				$userid = $addlin->usr_id;
				$postid = $addlin->post_id;
				$posttit = DB::table('posts')->where('id',$postid)->first();
				$title = $posttit->title;
				$out = strlen($title) > 50 ? substr($title,0,50)."..." : $title;
				$lol = $addlin->lol;
				$win = $addlin->win;
				$omg = $addlin->omg;
				$cute = $addlin->cute;
				$fail = $addlin->fail;
				$trashy = $addlin->trashy;
				$wtf = $addlin->wtf;
				$trend = $addlin->trend;
				$time = $addlin->created_at;
				$time1 = new Carbon($time);
			if($lol==null and $win == null and $omg==null and $cute==null and $fail==null and $trashy==null and $wtf==null and $trend==null)
			{}
			else
			{  ?>	
		<ul>
				<div><h6><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}">&nbsp;{{$userdel->name}}&nbsp;&nbsp;&nbsp;</a></span>"{{$out}}" and think it's 
<?php			//echo $username."  ";
				//echo $title." ";
				if($lol == 1)
				{
					$arrayName = array('lol' => 'lol');?>
					<li class="test">
						{{$arrayName['lol']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array('lol' => null);
				}
				if($win == 2)
				{
					$arrayName = array_add($arrayName,'win','win');?>
					<li class="test">
						{{$arrayName['win']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'win',null);
				}
				if($omg == 3)
				{
					$arrayName = array_add($arrayName,'omg','omg');?>
					<li class="test">
						{{$arrayName['omg']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'omg',null);
				}
				if($cute == 4)
				{
					$arrayName = array_add($arrayName,'cute','cute');?>
					<li class="test">
						{{$arrayName['cute']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'cute',null);
				}
				if($trashy == 5)
				{
					$arrayName = array_add($arrayName,'trashy','trashy');?>
					<li class="test">
						{{$arrayName['trashy']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'trashy',null);
				}
				if($fail == 6)
				{

					$arrayName = array_add($arrayName,'fail','fail');?>
					<li class="test">
						{{$arrayName['fail']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'fail',null);
				}
				if($wtf == 7)
				{
					$arrayName = array_add($arrayName,'wtf','wtf');?>
					<li class="test">
						{{$arrayName['wtf']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'wtf',null);
				}
				if($trend == 8)
				{
					$arrayName = array_add($arrayName,'trend','trend');?>
					<li class="test">
						{{$arrayName['trend']}}	
					</li>
<?php
				}
				else
				{
					$arrayName = array_add($arrayName,'trend',null);
				}
			
			?>
			 &nbsp;&nbsp;&nbsp;<span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span>
			</div>
			</ul>
			

<?php		}
		}
		}

?>

			

</div>
</div>
</div>
<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
@stop