@extends('layout.main')
@section('title',Config::get('settings.title'))
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
<script src="//code.jquery.com/jquery-1.11.0.js" type="text/javascript"></script>
<link href="/css/result-light.css" type="text/css" rel="stylesheet" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js" type="text/javascript"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<script src="http://podivej.se/js/summernote.min.js" type="text/javascript"></script>
<link href="http://podivej.se/css/summernote.css" type="text/css" rel="stylesheet" />
<link href="http://podivej.se/css/summernote-bs3.css" type="text/css" rel="stylesheet">
<!-- include libries(jQuery, bootstrap, fontawesome) -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<!-- include summernote css/js-->
<link href="{{ asset('dist/summernote.css') }}" rel="stylesheet">
<script src="{{ asset('dist/summernote.min.js') }}">
</script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({height: 300,
    minHeight: 10,             // set minimum height of editor
  	maxHeight: 600,codemirror: { // codemirror options
    theme: 'spacelab'
  }});
});

</script>

<?php
	
	$post = DB::table('posts')->where('id',$postid)->first();

		$postID= $post->id;
		$tit = $post->title;
		$url = $post->url;
		$credits = $post->credits;
		$des = $post->description;
		$headline = $post->headline;
		$thumbnail = $post->thumbnail;
	
?>
<div class="row all-posts">
<div class="container">
<div class="col-md-10 first-column">
<form action="{{ URL::route('edit-post-form',$postid = $postID) }}" data-toggle="validator" method="post" enctype="multipart/form-data">

	<div class="input-group input-group-lg">
			  <span class="input-group-addon">Title</span>
			  <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $tit }}" required>
			</div>
			{{$errors->first('title')}}
<br>
			<div class="input-group">
			  <span class="input-group-addon">headline</span>
			  <input type="text" class="form-control" placeholder="Username" name="headline" value="{{ $headline }}" required>
			</div>
			{{$errors->first('headline')}}
<br>
			<label>Description:</label>
			<textarea  id="summernote" columns="60" rows="10" class="form-control" name= "des" >{{ $des }}</textarea>
			{{$errors->first('des')}}
<br/>			 
			<label>Thumbnails:</label>
			 <div class="input-group">
               
                 
            <input class="btn btn-primary btn-file" type="file" title="Search for a file to add" name="thumbnail_img" data-error="pls upload thumbnail image" required>
                 
             </div>
             {{$errors->first('thumbnail_img')}}
    

<br>
			<div class="input-group input-group-sm">
			  <span class="input-group-addon">credits</span>
			  <input type="text" class="form-control" placeholder="credits" name="credits" value="{{ $credits }}">
			</div>
			{{$errors->first('credits')}}
<br>
			

			<div class="input-group input-group-sm">
			  <span class="input-group-addon">url</span>
			  <input type="text" class="form-control" placeholder="url" name="url" value="{{ $url }}" >
			</div>
			{{$errors->first('url')}}
			<br><br>
		<input type="submit" class = "btn btn-success" value="Submit post" />
		
</form>

</div>
</div>
</div>
<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
      </div>
@stop