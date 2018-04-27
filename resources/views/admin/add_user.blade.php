@extends('admin/main')
@section('title','Add User')
@section('content')
<div class="row">
    <!-- Basic example -->


    <!-- Horizontal form -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Add New User</h3></div>
            <div class="panel-body">
                @if(count($errors) >0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li style='color: red;'>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                @if(isset($user))
                {!! Form::model($user, ['method'=>'PATCH', 'route'=>['admin.users.update',$user->id], 'files'=>true,'class' => 'cmxform form-horizontal tasi-form','method' => 'POST','id'=> 'UpdateUser','novalidate' =>"novalidate"] ) !!}
                @else
                {!! Form::open(array('route'=>'admin.users.store','class' => 'cmxform form-horizontal tasi-form','method' => 'POST','id'=> 'CreateUser','novalidate' =>"novalidate"))!!}
                @endif
                <!--<form class="form-horizontal" role="form">-->
                
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                        {!! Form::text('email', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-2 control-label">Re Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Retype Password"  name="confirm_password">
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        @if(isset($user))
                        {!! Form::open(['method' => 'patch']) !!}
                        @endif
                        <button type="submit" class="btn btn-info" name="change_password">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->

</div> <!-- End row -->
@stop