@extends('admin.layout')


@section('title','Dashboard')


@section('content')


 <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            User Management
                        </header>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email-ID</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="">{{$user->name}}</td>
                                    
                                    <td>{{$user->email}}</td>
                                    <td>

                                      <!--  <a href="{{URL::to('admin/delete').'/'.$user->id}}" class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> Delete</a> -->
					<a href="{{URL::to('admin/deleteOption')}}" class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> Delete</a>

                                       </td>
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

@stop

