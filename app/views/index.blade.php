<?php
use Carbon\Carbon;
?>
@extends('layout.news')
@section('title',Config::get('settings.title'))
@section('body')

<div class="row top-slider">
<div class="container">
	<?php
//$post = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
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
					<div class="col-md-4 col-sm-4 col-xs-4 top-slider-image" >
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
						</a> <img  width="115" height="85" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img></a>
						@else
						   <img width="115" height="auto" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
						<div class="top-slider-image-caption">
							<p><a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >{{$out}}</a></p>
						</div>
					</div>
<?php }
 ?>
		
				</div>
			</div>
<?php } ?>	
		</div>
	</div>
<?php  

		//dd($postrand->id);
		$postid1 = $postrand->id;
		$tit1 = $postrand->title;
		$url1 = $postrand->url;
		$credits1 = $postrand->credits;
		$des1 = $postrand->description;
		$headline1 = $postrand->headline;
		$thumbnail1 = $postrand->thumbnail;
?>

	<div class="row featured-post" id="postswrapper">
		<div class="container">
			<div class="col-md-8 col-sm-12 top-slider-image" >
				@if($postrand->thumbnail)
				<a href="{{ URL::route('postdata', array('postid' => $postid1)) }}" >
   					<img width="700" height="350" id="img" src="{{asset('thumbnails')}}/{{$postrand->thumbnail}}"></img>
				</a>
				@else
				   <img width="700" height="350" id="img" src="{{asset('img/1.png')}}"></img>
				@endif
					<div class="top-slider-image-caption">
							<p><a href="{{ URL::route('postdata', array('postid' => $postid)) }}" > {{$tit1}}</a></p>
					</div>	
			</div>
			<div class="col-md-4 col-sm-12" >
				{{Config::get('settings.banner1')}}
			</div>
		</div>
		
	</div>
<div class="row all-posts">
<div class="container">
<div class="col-md-6 col-sm-5 col-xs-6 first-column" id="postswrapper">
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
				<div class="row post" id="loadmoreajaxloader">
					<div class="col-md-3 col-sm-12 post-img">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="115" height="85" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
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
<input type="hidden" id="currentpage" value="1">
<div class="col-md-4 col-sm-4 col-xs-6 second-column" id="postswrapper">
<?php 
$postdis = DB::table('posts')->orderby('created_at','desc')->get();
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
				<div class="row second-column-post" id="loadmoreajaxloader">
					<div class="col-md-12 col-sm-12">
						@if($addlin->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="330" height="200" id="img" src="{{asset('thumbnails')}}/{{$addlin->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
					</div>
					<div class="col-md-12 col-sm-12">
						<h4><a href="{{ URL::route('postdata', array('postid' => $postid)) }}">{{ $tit }}</a></h4>
						<p><span class="post-creator"><i class="icon-user"></i><a href="{{URL::route('userDashboard', $name = $userdel->name)}}"> {{$userdel->name}} </a></span> <span class="post-time"><i class="icon-time"></i> {{ $time1->diffForHumans() }}</span> </p>
					</div>
				</div>
<?php } ?>

			</div>

<div class="col-md-2 col-sm-3 col-xs-6 third-column">
<h3>Trending</h3>
<hr/>
<?php

foreach ($trend as $trendcount)
{
	$postid = $trendcount->id;
	$img = $trendcount->thumbnail;
	$title = $trendcount->title;
	$out = strlen($title) > 50 ? substr($title,0,50)."..." : $title;
?>

				<div class="row third-column-post">
					<div class="col-md-12 third-column-post-img">
						@if($trendcount->thumbnail)
						<a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >
   						 <img width="212" height="130" id="img" src="{{asset('thumbnails')}}/{{$trendcount->thumbnail}}"></img>
						</a>
						@else
						   <img width="115" height="76" id="img" src="{{asset('assets/img/1.png')}}"></img>
						@endif
						<div class="third-column-post-img-caption">
							<p><a href="{{ URL::route('postdata', array('postid' => $postid)) }}" >{{$out}}</a></p>
						</div>
					</div>
				</div>
<?php } ?>

			</div>
		</div>
	</div>
	  <div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
	<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="http://tubepeep.com/ads/public/c2ac417ce0cc5d394a91d250c9cb9f05.js?0af701fe=1,2,3,4,5"></script>
<script type="text/javascript">
$(window).scroll(function()
{
    if($(window).scrollTop() == $(document).height() - $(window).height())
    {
    	$("#loading").show();
        $.ajax({
        url: "infinitedashboard/"+(parseInt($("#currentpage").val())+1),
        thePage: parseInt($("#currentpage").val()),
        success: function(html) {
        	if (parseInt($("#currentpage").val())==this.thePage) {
	        	$("#currentpage").val(parseInt($("#currentpage").val())+1);
	        	$("#posts").append(html);
	        	$("#loading").hide();
	        }
        }
      });
    }
});
</script>	
@stop
</body>
</html>
