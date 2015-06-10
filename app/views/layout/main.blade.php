<!DOCTYPE html>

<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/resposive-style.css') }}">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	<link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	
</head>
<body>
	<div class="row buzzfeed-navbar">
		<div class="container">
			<div class="logo col-md-6 col-sm-5">
				<a href="{{URL::route('user-home')}}">
				<img src="{{ asset('img/logo.png') }}" width="290" height="60"></a>
			</div>
			<div class="badge-list col-md-6 col-sm-7">
				<ul class="nav nav-pills-badge nav-pills">
					<li>
						<a href="{{URL::route('feeds',$feed = 1)}}">
						<img src="{{ asset('img/lol-badge.png') }}">
						</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 2)}}">
						<img src="{{ asset('img/win-badge.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 3)}}">
						<img src="{{ asset('img/omg.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 4)}}">
						<img src="{{ asset('img/cute.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 5)}}">
						<img src="{{ asset('img/trashy.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 6)}}">
						<img src="{{ asset('img/fail.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 7)}}">
						<img src="{{ asset('img/wtf.png') }}">
					</a>
					</li>
					<li>
						<a href="{{URL::route('feeds',$feed = 8)}}">
						<img src="{{ asset('img/trending.png') }}">
					</a>
					</li>
				</ul>
			</div>
            
             <div class="secondary-login">
       <ul class="nav navbar-nav col-md-1 col-sm-3 col-xs-2">
            <div class="col-md-1 loggedin-icon">
                <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i></a>
	            <ul class="dropdown-menu">
                    <li><a href="{{ URL::route('add-post') }}"><i class="icon-chevron-right"></i> NEW POST</a></li>
					<li><a href="{{ URL::route('view-post') }}">MY FEED</a></li>
					<li><a href="{{ URL::route('post-dashboard') }}">DASHBOARD</a></li>
					<li><a href="{{ URL::route('update-setting') }}">SETTINGS</a></li>
					<li><a href="{{ URL::route('account-logout') }}">SIGN OUT</a></li>
                    
                </ul>
                 	
									
			</div>
        </ul>
        
        <form class="navbar-form col-sm-9 col-xs-10" method="get" action="{{URL::route('search')}}">
				
						<input id="search-box" type="text" placeholder="Enter keyword to search" class="search-box" name="q" />
		  				<label for="search-box"><i class="icon-search"></i></label>
		  				<button id="search_submit" style="display: none;" type="submit"></button>
		  		
		  		</form>
    </div>
            
            
            
		</div>
	</div>
	@yield('logo')
    
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
	       <li><a href="{{ URL::route('post-catg' , $postval = 5) }}">News</a></li>
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
                                        <div class="divider"></div>
                                        <h5>Section</h5>
                            
                        </div>
                        
			            <div class="col-sm-4">
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
			            </div>
		            </div>
	            </ul>
	        </li>
	        
        </ul>
        
        
        
        
      <ul class="nav navbar-nav navbar-right">
            <div class="col-md-1 loggedin-icon">
                <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i></a>
	            <ul class="dropdown-menu">
                    <li><a href="{{ URL::route('add-post') }}"><i class="icon-chevron-right"></i> NEW POST</a></li>
					<li><a href="{{ URL::route('view-post') }}">MY FEED</a></li>
					<li><a href="{{ URL::route('post-dashboard') }}">DASHBOARD</a></li>
					<li><a href="{{ URL::route('update-setting') }}">SETTINGS</a></li>
					<li><a href="{{ URL::route('account-logout') }}">SIGN OUT</a></li>
                    
                </ul>
                 	
									
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
    
    
    

	<!--<div class="row buzzfeed-second-nav">
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
			<div class="col-md-1 loggedin-icon">
				<p data-toggle="modal" >
				<i class="icon-user"></i>
				<div class="logged-in">
					<li><a href="{{ URL::route('add-post') }}"><i class="icon-chevron-right"></i> NEW POST</a></li>
					<li><a href="{{ URL::route('view-post') }}">MY FEED</a></li>
					<li><a href="{{ URL::route('post-dashboard') }}">DASHBOARD</a></li>
					<li><a href="{{ URL::route('update-setting') }}">SETTINGS</a></li>
					<li><a href="{{ URL::route('account-logout') }}">SIGN OUT</a></li>
				</div>
				</p>
			</div>
		</div>
	</div>-->
	
	@yield('body')
