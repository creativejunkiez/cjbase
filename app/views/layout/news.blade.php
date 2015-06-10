<!DOCTYPE html>

<html>
<head>
	<title> @yield('title')</title>
   
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/resposive-style.css') }}">
	<link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	
</head>
<body>
	<div class="row buzzfeed-navbar">
		<div class="container">
			<div class="logo col-md-6 col-sm-5">
			<a href="{{URL::route('home')}}"><img src="{{ asset('img/cjlogo.png') }}" width="auto" height="60"></a>
			{{$errors->first('email')}}
			{{$errors->first('name')}}
			{{$errors->first('password')}}
			@if(Session::has('global'))
					<div class="alert alert-success" id="result">
						{{Session::get('global')}}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
				@endif
			</div>

			<div class="badge-list col-md-6 col-sm-7">
				<ul class="nav nav-pills-badge nav-pills">
                
				</ul>
			</div>
            <div class="secondary-login">
     <div class="col-md-1 col-sm-3 col-xs-2 login-icon">
				<p data-toggle="modal" data-target="#myModal">
					<i class="icon-user"></i>
				</p>
			</div>
        
          <form class="col-sm-9 col-xs-10" method="get" action="{{URL::route('search')}}">
				
						<input id="search-box" type="text" placeholder="Enter keyword to search" class="search-box" name="q" />
		  				<label for="search-box"><i class="icon-search"></i></label>
		  				<button id="search_submit" style="display: none;" type="submit"></button>
		  		
		  		</form>
    </div>
            
            
		</div>
	</div>
    
    
    <!--custom nav starts -->
    <div class="primary-nav-a">
    <nav class="navbar navbar-default container" role="navigation">
        
    <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<!-- <a class="navbar-brand" href="#">Brand</a>-->
	</div>
	<!--/.navbar-header-->

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::route('post-catg', $postval = 5) }}">News</a></li>
			<li><a href="{{ URL::route('post-catg', $postval = 1) }}">Buzz</a></li>
			<li><a href="{{ URL::route('post-catg', $postval = 2) }}">Life</a></li>
			<li><a href="{{ URL::route('post-catg', $postval = 3) }}">Entertainment</a></li>
			<li><a href="{{ URL::route('post-catg', $postval = 4) }}">Videos</a></li>
	        
	        <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More<b class="caret"></b></a>
	            <ul class="dropdown-menu multi-column columns-3">
					<div class="row">
						<div class="col-md-12 btn-blue">
							<p>Buzzfeed Community <a href="{{ URL::route('add-post') }}">Make A Post!</a></p>
							<!--div class="divider"></div>
							<h5>Section</h5-->
                        </div>
                        
			            <!--div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					            <li><a href="{{URL::route('searchKey',$q = "animal")}}">Animals</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "books")}}">Books</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Business")}}">Business</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "BuzzReads")}}">BuzzReads</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Celebrity")}}">Celebrity</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "DIY")}}">DIY</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "Food")}}">Food</a></li>
				            </ul>
			            </div>
			            <div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					          <li><a href="{{URL::route('searchKey',$data = "Geeky")}}">Geeky</a></li>
                               <li><a href="{{URL::route('searchKey',$data = "GITFeed")}}">GIT Feed</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "Ideas")}}">Ideas</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "LGBT")}}">LGBT</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "Music")}}">Music</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "Parents")}}">Parents</a></li>
                                <li><a href="{{URL::route('searchKey',$data = "Politics")}}">Politics</a></li>
                                
				            </ul>
			            </div>
			            <div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					            <li><a href="{{URL::route('searchKey',$data = "Rewind")}}">Rewind</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Sports")}}">Sports</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Style")}}">Style</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Tech")}}">Tech</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "Travel")}}">Travel</a></li>
					            <li><a href="{{URL::route('searchKey',$data = "World")}}">World</a></li>
				            </ul>
			            </div-->
		            </div>
	            </ul>
	        </li>
	        
        </ul>
      <ul class="nav navbar-nav navbar-right">
            <div class="col-md-1 login-icon">
				<p data-toggle="modal" data-target="#myModal">
					<i class="icon-user"></i>
				</p>
			</div>
        </ul>
        
        <form class="navbar-form navbar-right" method="get" action="{{URL::route('search')}}">
				
						<input id="search-box" type="text" placeholder="Enter keyword to search" class="search-box" name="q" />
		  				<label for="search-box"><i class="icon-search"></i></label>
		  				<button id="search_submit" style="display: none;" type="submit"></button>
		  		
		  		</form>
        
                
    </div>
    <!--/.navbar-collapse-->
            
            
</nav>
<!--/.navbar-->
   </div>
    <!--custom nav ends -->
    
    
    <!-- old nav
	<div class="row buzzfeed-second-nav">
		<div class="container">
			<div class="col-md-8 second-nav-menu">
				<ul class="nav nav-pills">
					<li><a href="{{ URL::route('post-catg' , $postval = 5) }}">News</a></li>
					<li><a href="{{ URL::route('post-catg', $postval = 1) }}">Buzz</a></li>
					<li><a href="{{ URL::route('post-catg', $postval = 2) }}">Life</a></li>
					<li><a href="{{ URL::route('post-catg', $postval = 3) }}">Entertainment</a></li>
					<li><a href="{{ URL::route('post-catg', $postval = 4) }}">Videos</a></li>
					<li><a href="#" class="more">More <i class="icon-chevron-down"></i></a>
						<div class="row hover-hidden">
							<div class="col-md-12">
								<div class="row hover-hidden-header">
									<div class="col-md-12 btn-blue">
										<p>Buzzfeed Community <a href="{{ URL::route('add-post') }}">Make A Post!</a></p>
									</div>
								</div>
								<div class="row hover-hidden-second">
									<h5>Section</h5>
									<div class="col-md-4">
										<p><a href="{{URL::route('searchKey',$q = "animal")}}">Animals</a></p>
										<p><a href="{{URL::route('searchKey',$data = "books")}}">Books</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Business")}}">Business</a></p>
										<p><a href="{{URL::route('searchKey',$data = "BuzzReads")}}">BuzzReads</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Celebrity")}}">Celebrity</a></p>
										<p><a href="{{URL::route('searchKey',$data = "DIY")}}">DIY</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Food")}}">Food</a></p>
									</div>
									<div class="col-md-4">
										<p><a href="{{URL::route('searchKey',$data = "Geeky")}}">Geeky</a></p>
										<p><a href="{{URL::route('searchKey',$data = "GITFeed")}}">GIT Feed</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Ideas")}}">Ideas</a></p>
										<p><a href="{{URL::route('searchKey',$data = "LGBT")}}">LGBT</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Music")}}">Music</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Parents")}}">Parents</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Politics")}}">Politics</a></p>
									</div>
									<div class="col-md-4">
										<p><a href="{{URL::route('searchKey',$data = "Rewind")}}">Rewind</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Sports")}}">Sports</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Style")}}">Style</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Tech")}}">Tech</a></p>
										<p><a href="{{URL::route('searchKey',$data = "Travel")}}">Travel</a></p>
										<p><a href="{{URL::route('searchKey',$data = "World")}}">World</a></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 hover-hidden-footer">
										<p> </p>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			
			<div class="col-md-3 searchbox">
				<form method="get" action="{{URL::route('search')}}">
				<p>
						<input id="search-box" type="text" placeholder="Enter keyword to search" class="search-box" name="q" />
		  				<label for="search-box"><i class="icon-search"></i></label>
		  				<button id="search_submit" style="display: none;" type="submit"></button>
		  		</p>
		  		</form>
		  	</div>
		  	
			<div class="col-md-1 login-icon">
				<p data-toggle="modal" data-target="#myModal">
					<i class="icon-user"></i>
				</p>
			</div>
		
		</div>
	</div>  -->
    
    
    
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p><center><h4>Sign In here</h4></center></p>
		        <a class="btn btn-block btn-social btn-google-plus btn-cust" href="{{ URL::Route('account-google') }}">
    			<i class="fa fa-google-plus"></i> Sign in with google+</a>
 			<br>
 			<a class="btn btn-block btn-social btn-facebook btn-cust" href="{{ URL::Route('account-fbcreate') }}">
    			<i class="fa fa-facebook"></i> Sign in with facebook</a>
    		 </div>
		      <div class="modal-footer delicious-modal-footer"><center>
		      	<p style="font-weight:bold;margin-bottom:0px;" data-toggle="modal" data-target="#myModal1"><a href="#">Sign Up with your email address</a></p>
		      	<p data-toggle="modal" data-target="#myModal2">Already have a Buzzfeed account? <a href="#">Sign in</a></p></center>
		      </div>
		    </div>
		  </div>
		</div>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ URL::route('account-create-post') }}" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" class="form-control sign-up-modal" name="fullname">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control sign-up-modal" name="email">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control sign-up-modal" name="name">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control sign-up-modal" name="password">
						</div>
						<p>By clicking the button, you agree to the <a href="#">Terms & Conditions</a></p>
					</div>
					<div class="modal-footer mymodal1footer">
						<input type="submit" value="Sign Up for Buzzfeed" />
					</div>
					</form>
				</div>
			</div>
		
	</div>
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form action="{{ URL::route('account-sign-in-post') }}" method="post">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row delicious-modal-social-icons">
							
								<p style="font-size:22px;line-height: 25px;color:#3B5998;"><i class="icon-facebook-sign"></i><a href="{{ URL::Route('account-fbcreate') }}">Facebook</a></p>
							
								<p style="font-size:22px;line-height: 25px;color:#C23321;"><i class="icon-google-plus-sign"></i><a href="{{ URL::Route('account-google') }}"> Google</a></p>
							
						</div>
						<div class="row">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control sign-up-modal" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control sign-up-modal" name="password">
							</div>
							<p class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal3" > Forgot Password? </a></p>
						</div>
					</div>
					<div class="row modal-footer mymodal2footer">
						<div class="col-md-6">
						
						</div>
						<div class="col-md-6">
							<p style="font-weight:bold;" class="btn btn-blue"><input type="submit" value="Sign In" /></button></p>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-group">
							<center>
								<form action="{{URL::route('forgotPassPost')}}" method="post">
									<br/><br/><br/><br/><br/><br/>
									<h3>Trouble Signing In?</h3>
									<p>Enter the email address for your account and we'll send you your username and a link to reset your password.</p>
									<input type="text" placeholder="Email address" name="email" class="form-control"/>
									<br/>
									<button type="submit" class="btn btn-info form-control">Submit</button>
								</form>
							</center>
							<br/><br/><br/><br/><br/><br/>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@yield('body')
