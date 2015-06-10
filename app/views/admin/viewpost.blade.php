@extends('admin.layout')


@section('title','Dashboard')


@section('content')


 <div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
              <h2>  Post Details </h2>
            </header>
            <div class="panel-body">
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
								?>
								<h2>{{$tit}}</h2><br/>
								{{$headline}}<br/><br>
								<div class="contentdis">
								{{$des}}
								</div>
					        </div>
					    </div>
					</div>
				</div>
				<br>
				<br>
				<center><a href="{{URL::to('admin/postdelete').'/'.$postid}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></center>
			</div>
		</section>
	</div>
</div>

@stop

