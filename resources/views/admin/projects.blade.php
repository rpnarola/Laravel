@extends('admin/main')
@section('title', 'Buildings')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                Manage Projects
            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive" style="overflow-x: auto;">
                <div class="box-tools m-b-15">

                    {{Form::open(array('url'=>'admin/projects','method'=>'get'))}}
                    <div class="input-group">
<!--                        {{Html::link('admin/newproject','Add New',array('class'=>'btn btn-primary','style'=>'width: 150px;'))}}-->
                           <input type="text" name="searchterm" class="form-control input-sm pull-right" value="<?php echo Session::get('search'); ?>" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Likes</th>
                            <th>Technology</th>
                            <th>website</th>
                            <th>Features</th>
<!--                            <th>WallPaper</th>
                            <th>IconImage</th>-->
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>

                        @if(count($projects))
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->likes}}</td>
                            <td>{{ $project->technology}}</td>
                            <td>{{ $project->web_link}}</td>
                            <td>{{ $project->features}}</td>
<!--                            <td>{{Html::image('/upload/thumb/'.$project->wallpaper,'wallpaper')}}</td>
                            <td>{{Html::image('/upload/thumb/'.$project->icon_image,'icon_image')}}</td>-->
                            <td><a href="#" class="btn btn-warning">Update</a></td>
                            <td>
                                {{Form::submit('Delete', ['onClick' => 'return confirm("Are you sure you want deactivate this Record")','class'=>'btn btn-danger'])}}
                                {{Form::close()}}</td> 
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="12">
                                <div class="alert alert-block alert-danger fade in">
                                    <strong>Sorry! </strong> We could not find any records.
                                </div>
                            </td>
                        </tr>
                        @endif

                    </tbody></table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div>
            <p>{{$projects->appends(Request::only('searchterm'))->links()}}</p>
        </div>
    </div>  
</div>
@stop