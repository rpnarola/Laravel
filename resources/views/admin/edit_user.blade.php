@extends('admin/main')
@section('title','Edit User')
@section('content')
<div class="row">
    <!-- Basic example -->


    <!-- Horizontal form -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Edit User</h3></div>
            <div class="panel-body">
                @if(count($errors) >0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li style='color: red;'>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <!--<form class="form-horizontal" role="form">-->
                {!! Form::open(array('METHOD' => 'PATCH','route'=>['admin.users.update',$user->id],'class' => 'cmxform form-horizontal tasi-form','method' => 'POST','id'=> 'CreateUser','novalidate' =>"novalidate"))!!}
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="name" type="text" required="" aria-required="true" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="email" name="email" required="" aria-required="true" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info" name="change_password">Change Password</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->

</div> <!-- End row -->
@stop