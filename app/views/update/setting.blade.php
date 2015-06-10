@extends('layout.main')
@section('title',Config::get('settings.title').'settings')
@section('body')
<div class="row top-slider" id="postswrapper">
<div class="container">
<?php

$post1 = array_chunk($post, 3);

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
						   <img width="115" height="76" id="img" src="{{asset('img/logo.png')}}"></img>
						@endif
						<div class="top-slider-image-caption">
							<p> {{$out}}</p>
						</div>
					</div>
<?php }
 ?>
		
				</div>
			</div>
<?php } ?>	
		</div>
</div>
<br>
	<div class="container">
		<div class="row">
		<div class="col-md-7 col-sm-9 col-xs-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#customize" role="tab" data-toggle="tab">Customize your page</a></li>
			  <li role="presentation"><a href="#account" role="tab" data-toggle="tab">Account Settings</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content buzzfeed-tab-content">
			  <div role="tabpanel" class="tab-pane active" id="customize">
			  	<form action="{{ URL::Route('update-details-post')}}" method="post" enctype="multipart/form-data">
			  	<div class="row">
			  		<div class="col-md-2">
			  			<h5>Basics</h5>
			  		</div>
			  		
			  		<div class="col-md-10">
			  			<br/>
			  			<label>Name</label>
			  			<input type="text" class="form-control" name="name" required>
			  			{{$errors->first('name')}}
			  			<br/>
			  			<label>User Image</label>
			  			<input type="file" name="usr_img"/>
			  			<p>upload a 83x83 pixel image to be used as your avatar</p>
			  			{{$errors->first('usr_img')}}
			  			<br/>
			  			<label>Header Image</label>
			  			<input type="file" name="header_img"/>
			  			<p>Upload a 1020x150 pixel image to be used as your header</p>
			  			{{$errors->first('header_img')}}
			  			<br/>
			  			<label>Description/Bio</label>
			  			<textarea class="form-control" name="des"></textarea>
			  			{{$errors->first('des')}}
			  			<br/>
			  		</div>
			  	</div>
			  	<div class="row space"></div>
			  	<div class="row">
			  		<div class="col-md-2">
			  			<h5>Details</h5>
			  		</div>
			  		<div class="col-md-10">
			  			<br/>
			  			<label>Organization/Title</label>
			  			<input type="text" class="form-control" name="org" />
			  			{{$errors->first('org')}}
			  			<br/>
			  			<label>Location</label>
			  			<input type="text" class="form-control" name="location" />
			  			{{$errors->first('location')}}
			  			<br/>
			  			<label>Gender</label><br/>
			  			<select name="gender" id="gender">
			  				<option> </option>
			  				<option value="male">Male</option>
			  				<option value="female">Female</option>
			  				<option value="other">Other</option>
			  			</select>
			  			{{$errors->first('gender')}}
			  			<br/>
			  			<br/>
			  			<label>Birthday</label><br/>
						<input type="text" class="form-control" name="dob" />
						{{$errors->first('dob')}}
			  			<br/>
			  			<br/>
			  		</div>
			  	</div>
			  	<div class="row space"></div>
			  	<div class="row">
			  		<div class="col-md-2">
			  			<h5>Link</h5>
			  		</div>
			  		<div class="col-md-10">
			  			<br/>
			  			<label>Website Link</label>
			  			<input type="text" name="web_link" class="form-control">
			  			<br/>
			  			<label>Twitter Link</label>
			  			<input type="text" name="tw_link" class="form-control">
			  			<br/>
			  			<label>Facebook Page</label>
			  			<input type="text" name="fb_link" class="form-control">
			  			<br/>
			  		</div>
			  	</div>
				<div class="row">
			  		<div class="col-md-4 col-md-offset-4">
			  			<br/>
			  			<button type="submit" class="btn btn-primary">Save Settings</button>
			  			<a href="#"> Cancel </a>
			  			<br/>
			  			<br/>
			  		</div>
			  	</div>
			  </form>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="account">
			  	<form action="{{ URL::Route('update-password-post') }}" data-toggle="validator" method="post">
			  	<div class="row">
			  		<div class="col-md-2">
			  			<h5>Password</h5>
			  		</div>
			  		<div class="col-md-10">
			  			<br/>
			  			<label>Current Password</label>
			  			<input type="password" class="form-control" name="currentpass" required>
			  			{{$errors->first('currentpass')}}<br/>
			  			<label>New Password</label>
			  			<input type="password" class="form-control" name="password" id="inputPassword" required>
			  			{{$errors->first('password')}}<br/>
			  			<label>New Password Again</label>
			  			<input type="password" class="form-control" name="passwordagain" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" required>
			  			{{$errors->first('passwordagain')}}<br/>
			  			<br/>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-md-4 col-md-offset-4">
			  		<br/>
			  		<button type="submit" class="btn btn-primary" name="settings">Save settings</button> <a href="#">Cancel</a>
			  		</div>
			  		<br/>
			  		<br/>
			  	</div>
			  </form>
			  </div>
			</div>
		</div>
		</div>
	</div>
	<script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>

<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
</div>
@stop
</body>
</html>