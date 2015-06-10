<?php
use Carbon\Carbon;
?>
@extends('layout.main')
@section('title',Config::get('settings.title'))
<link rel="stylesheet" href="{{asset('css/socialstyle.css')}}" media="screen" type="text/css" />
@section('body')
<?php $tw = URL::current(); 
$provenshare = "http://gentleninja.com/buzzfeedclonescript/";?>
<br/>
<div class="row top-slider" id="postswrapper">
<div class="container">
	<?php
	//$post = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
	$post1 = array_chunk($listpost, 3);

	//dd($post1[1]);
	foreach ($post1 as $post_chk) 
	{
		?>
		<div class="col-md-4 part-1">
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
					<div class="col-md-4 top-slider-image" id="loadmoreajaxloader">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
							 <img width="115" height="85" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img></a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('img/user.png')}}"></img>
						@endif
						<div class="top-slider-image-caption">
							<p><a href="{{ URL::route('postdata', array('postid' => $postid)) }}" > {{$out}}</a></p>
						</div>
					</div>
				<?php }?>
						
			</div>
		</div>
	<?php } ?>	
</div>
</div>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<?php

				$postid = $data->id;
				$tit = $data->title;
				$url = $data->url;
				$credits = $data->credits;
				$des = $data->description;
				$headline = $data->headline;
				$thumbnail = $data->thumbnail;
				$count = $data->count;
				//HTML::link($url);

				?>
				<h2>{{$tit}}</h2><br/>
				{{$headline}}<br/><br>
					
				<div class="row">
					<div class="col-md-1">
						@if($userdel->usr_img)
						    <img width="50" height="50" id="img" src="{{asset('uploads')}}/{{$userdel->header_img}}"></img>
						@else
						    <img width="50" height="50" id="img" src="{{asset('img/user.png')}}"></img>
						@endif
					</div>
					<div class="col-md-2">
						<h5><a href="{{URL::route('userDashboard', $name = $userdel->name)}}">{{$userdel->name}}</a></h5>
					</div>
				</div>
				<br>
				<div class="row">
				 <div class="social-share">
				 	<a style="margin:10px;" href="http://www.facebook.com/share.php?u={{$tw}}"><i class='icon-facebook'></i></a>
				 	<a style="margin:10px;" href="https://twitter.com/intent/tweet?text={{$tw}}"><i class='icon-twitter'></i></a>
				 	<a style="margin:10px;" href="https://plus.google.com/share?url={{$tw}}"><i class='icon-google-plus'></i></a>
	
				 	
				 </div> 
				</div>
				<br/>
				<div class="contentdis">
				{{$des}}
				</div>
				<br/>
				<br/>
				<br/>
				<p id="feedmsg"> </p>
				@if(Session::has('msg'))
					{{Session::get('msg')}}
				@else

				@endif
				<br/>
				@if(Session::has('msg1'))
					{{Session::get('msg1')}}
				@else

				@endif
			</div>
				<div class="row" id="feeds">
					<h4>YOUR REACTION ?</h4>
					<div class="col-md-1 post-badges">
						<p class="custom" id="lolcount">{{$lolcount}}</p>
						<p><a id="lolfeed" href="{{ URL::route('postLikecount', array('like' => '1','postid' => $postid)) }}" >LOL</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="omgcount">{{$omgcount}}</p>
						<p><a id="omgfeed" href="{{ URL::route('postLikecount', array('like' => '3','postid' => $postid)) }}" >OMG</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="wincount">{{$wincount}}</p>
						<p><a id="winfeed" href="{{ URL::route('postLikecount', array('like' => '2','postid' => $postid)) }}" >WIN</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="failcount">{{$failcount}}</p>
						<p><a id="failfeed" href="{{ URL::route('postLikecount', array('like' => '6','postid' => $postid)) }}" >FAIL</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="cutecount">{{$cutecount}}</p>
						<p><a id="cutefeed" href="{{ URL::route('postLikecount', array('like' => '4','postid' => $postid)) }}" >CUTE</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="wtfcount">{{$wtfcount}}</p>
						<p><a id="wtffeed" href="{{ URL::route('postLikecount', array('like' => '7','postid' => $postid)) }}" >WTF</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="trashycount">{{$trashycount}}</p>
						<p><a id="trashyfeed" href="{{ URL::route('postLikecount', array('like' => '5','postid' => $postid)) }}" >TRASHY</a></p>
					</div>
					<div class="col-md-1 post-badges">
						<p class="custom" id="trendcount">{{$trendcount}}</p>
						<p><a id="trendfeed" href="{{ URL::route('postLikecount', array('like' => '8','postid' => $postid)) }}" >TREND</a></p>
					</div>
				</div>
			<div class = "row">
				<h3>Contribution</h3>
				<?php
					$lollike = null;
					$winlike = null;
					$omglike = null;
					$cutelike = null;
					$faillike = null;
					$trashylike = null;
					$wtflike = null;
					$trendlike = null;
					$title = $data->title;
					//$usrid = $userdel->id;
					//$username = $userdel->name;

			foreach ($postlike as $likes) 
				{
					$arrayName = null;
					$usrid = $likes->usr_id;
					$postid = $likes->post_id;
					//$posttit = DB::table('posts')->where('id',$postid)->first();
					//dd($posttit);
					$likerow = DB::table('postlinks')->where('post_id',$postid)->where('usr_id', $usrid)->get();
					foreach ($likerow as $addlin) 
					{
					
						$id = $addlin->id;
						$userid = $addlin->usr_id;
						$postid = $addlin->post_id;
						$userna = DB::table('users')->where('id',$userid)->first();
						$username = $userna->name;
						//$posttit = DB::table('posts')->where('id',$postid)->first();
						//$title = $posttit->title;
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
						<div><h6><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}">&nbsp;{{$username}}&nbsp;&nbsp;&nbsp;</a></span>"{{$out}}" and think it's 
			<?php			
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
			<?php	}
				}
				}?>
			</div>
			<div class="fb-comments" data-href="{{$tw}}" data-numposts="5" data-colorscheme="light"></div>
		</div>
		<div class="col-md-4">
			<div class="col-md-12">
				<p class="heading">Connect with Buzzfeed India</p>
				<a class="btn btn-social-icon btn-facebook" style="padding:1px;" href="http://www.facebook.com/share.php?u={{$provenshare}}">
								<i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
							<a class="btn btn-social-icon btn-twitter" href="https://twitter.com/intent/tweet?text={{$provenshare}}">
								<i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
							<a class="btn btn-social-icon btn-google-plus" style="padding:1px;" href="https://plus.google.com/share?url={{$provenshare}}">
								<i class="fa fa-google-plus"></i></a>
			</div>

			<?php 
			//$postdis = DB::table('posts')->orderby('created_at','desc')->get();
			foreach ($userpost as $addlin) 
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
							<div class="col-md-12 ">
								@if($addlin->thumbnail)
								<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
		   						 <img width="360" height="200" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
								</a>
								@else
								   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
								@endif
							</div>
							<div class="col-md-12 ">
								<h4><a href="#">{{ $tit }}</a></h4>
								<p><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}"> {{$userdel->name}} </a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> </p>
							</div>
						
		<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=267107900165688&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
$(document).ready(function(){
	
 	$("#lolfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#lolcount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
<script>
$(document).ready(function(){
	
 	$("#omgfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#omgcount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
<script>
$(document).ready(function(){
 	$("#winfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#wincount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 });
</script>
<script>
$(document).ready(function(){
 	$("#cutefeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#cutecount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 });
</script>
<script>
$(document).ready(function(){
	
 	$("#failfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#failcount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
<script>
$(document).ready(function(){
	
 	$("#trashyfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#trashycount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
<script>
$(document).ready(function(){
	
 	$("#trendfeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#trendcount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
<script>
$(document).ready(function(){
	
 	$("#wtffeed").click(function(evt){
 		evt.preventDefault();
 		console.log("catch");
 		var url = $(this).attr("href");
 		var formData = $(this).serialize();
 		$.ajax(url, {
 			data : formData,
 			type : "GET",
 			success : function(response){
 				console.log(response);
 				$("#wtfcount").html(response.feedcount);
 				$("#feedmsg").html(response.msg);
 			}
 		});
	});
 
});
</script>
			<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
			<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
		<br>
		<br>
		<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
		@stop	
		</body>
		</html>