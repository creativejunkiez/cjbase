@extends('admin.layout')

@section('title',Config::get('settings.title').' Admin Panel')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-user"></i></span>
            <div class="mini-stat-info">
                <span>{{$statistics['users']}}</span>
                Registered users
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-building-o"></i></span>
            <div class="mini-stat-info">
                <span>{{$statistics['posts']}}</span>
                Posts added
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-user"></i></span>
            <div class="mini-stat-info">
               <center> <span>{{$recentuser->name}}</span>
                Recent User
            </div></center>
        </div>
    </div>
  
</div>

@stop