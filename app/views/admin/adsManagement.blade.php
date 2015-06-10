@extends('admin.layout')


@section('title','Ads Management')


@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <section class="panel">
            <header class="panel-heading">
               Advertisement Management
            </header>
            <div class="panel-body">
                <form method="post" action="{{URL::route('updateAds')}}">
                    <div class="row">
                        <label class="col-sm-2"> Banner 1 : </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="banner1">{{Config::get('settings.banner1')}}</textarea> 
                        </div>
                    </div>
                    <br>
               
                    <br>
                    <input type="submit" value="Save Changes" class="pull-right btn btn-primary">
                </form>
            </div>
        </section>

    </div>
</div>

@stop

