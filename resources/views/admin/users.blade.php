@extends('admin/main')
@section('title', 'Users')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                Manage Users
            </header>
            <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

            <!-- </div> -->
            <div class="panel-body table-responsive" style="overflow-x: auto;">
                <div class="box-tools m-b-15">

                    {{Form::open(array('url'=>'admin/users','method'=>'get'))}}
                    <div class="input-group">
                        {{Html::link('admin/adduser','Add New',array('class'=>'btn btn-primary','style'=>'width: 150px;'))}}
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
                            <th>Email</th>
<!--                            <th>WallPaper</th>
                            <th>IconImage</th>-->
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>

                        @if(count($users))
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning">Update</a></td>
                            <td>{!! Form::open(['method' => 'DELETE', 'route'=>['admin.users.destroy', $user->id],'class' => 'delete_user','id' => 'delete_user'.$user->id,'data-id'=>$user->id]) !!}
                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {{Form::close()}}
                                </td> 
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
            <p>{{$users->appends(Request::only('searchterm'))->links()}}</p>
        </div>
    </div>  
</div>
<script src="http://localhost:8000/js/jquery.js"></script>

<script>    
    $('.delete_user').on('submit',function(event){
        var id = $(this).attr('data-id');
        event.preventDefault();
        swal({
                title: "Confirm Delete",
                text: "Are you sure to delete this user?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                  $('#delete_user'+id).submit();
                }
                else{
                    swal("cancelled", "User deletion Cancelled", "error");
                }
            });
    });
</script>
@stop