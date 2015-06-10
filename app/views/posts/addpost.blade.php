@extends('layout.main')
@section('title',Config::get('settings.title').'addpost')
@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
	$(":file").filestyle({buttonName: "btn-primary"});
	</script>
	<script type="text/javascript">
		$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
	</script>
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
    $('#summernote').summernote({height: 300,codemirror: { // codemirror options
    theme: 'spacelab'
  }});
});

</script>
<div class="row all-posts">
<div class="container">
    <div class="col-md-10">
    @if(Session::has('global'))
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">X</button>
  
    <p>{{Session::get('global')}}</p>
  </div>
   
@endif    
    </div>
    
<div class="col-md-10 first-column">
</br>
<form action="{{ URL::route('adding-post') }}" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">

			<div class="input-group input-group-lg">
			  <span class="input-group-addon">Title</span>
			  <input type="text" class="form-control" placeholder="Title" name="title" required>
			  <div class="help-block with-errors"></div>
			</div>
			{{$errors->first('title')}}
<br>
			<div class="input-group">
			  <span class="input-group-addon">headline</span>
			  <input type="text" class="form-control" placeholder="headline" name="headline" required>
			</div>
			{{$errors->first('headline')}}
<br>
			<label>Description:</label>
			<textarea  id="summernote" columns="60" rows="10" class="form-control" name= "des"></textarea> 
			 {{$errors->first('des')}}<br/>

			<label>Thumbnails:</label>
			 <div class="input-group">
               
                  <input class="btn btn-primary btn-file" type="file" title="Search for a file to add" name="thumbnail_img" data-error="pls upload thumbnail image" required>
                
            </div>
            {{$errors->first('thumbnail_img')}}
<br>
			<div class="input-group input-group-sm">
			  <span class="input-group-addon">credits</span>
			  <input type="text" class="form-control" placeholder="credits" name="credits">
			</div>
			{{$errors->first('credits')}}
<br>
			 <label>catagory:</label>
			<select  name="catg" id="catg">
  					<option value="5" name="news">news</option>
  					<option value="1" name="buzz">buzz</option>
  					<option value="2" name="life">life</option>
  					<option value="3" name="enterianment">enterianment</option>
  					<option value="4" name="vedio">vedio</option>
			</select>
			{{$errors->first('catg')}}</br><br>

			<div class="input-group input-group-sm">
			  <span class="input-group-addon">url</span>
			  <input type="text" class="form-control" placeholder="url" name="url">
			</div>
			{{$errors->first('url')}}
			<br><br>
		<input type="submit" class = "btn btn-success" value="Submit post" />
</form>
<br>
<br>
</div>
</div>
</div>
<div class="footer-text">
        <p><center>{{Config::get('settings.footer')}}</center></p>
</div>
@stop