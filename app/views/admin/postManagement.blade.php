@extends('admin.layout')


@section('title','Dashboard')


@section('content')


 <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Post Management
                        </header>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post Title</th>
                                    <th>Headline</th>
                                    <th>view</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php                            
                                    foreach($posts as $post)
                                    {
                                        $tit = $post->title;
                                        $head = $post->headline;
                                        $headout = strlen($head) > 20 ? substr($head,0,20)."..." : $head;   
                                        $titout = strlen($tit) > 20 ? substr($tit,0,20)."..." : $tit;  
                                    ?>  
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$titout}}</td>
                                            <td>{{$headout}}</td>
                                            <td>
                                                 <a href="{{URL::route('adminPostView',array('id' => $post->id))}}" class="btn btn-xs btn-info"> <i class="fa fa-eye"></i> view </a>
                                              <!--  <a href="{{URL::to('admin/postdelete').'/'.$post->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a> -->
						<a href="{{URL::to('admin/deleteOption')}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>	

                                            </td>
                                        </tr>
         <?php                           }
                                    ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

@stop

