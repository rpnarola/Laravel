<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Admin</title>

        


        <!-- Bootstrap core CSS -->
        {{Html::style('css/bootstrap.min.css')}}  
        {{Html::style('css/bootstrap-reset.css')}}

        <!--Animation css-->
        {{Html::style('css/animate.css')}}

        <!--Icon-fonts css-->
        {{Html::style('css/font-awesome/css/font-awesome.css')}}
        {{Html::style('css/ionicon/css/ionicons.min.css')}}

        <!--Morris Chart CSS -->
        {{Html::style('css/morris/morris.css')}}

        <!-- Custom styles for this template -->
        {{Html::style('css/style.css')}}
        {{Html::style('css/helper.css')}}


    </head>


    <body>

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"> 
                   <h3 class="text-center m-t-10"> Sign In to <strong>Velonic</strong> </h3>
                </div> 

               
                {{Form::open(array('url'=>'admin/login','class'=>'form-horizontal m-t-40'))}}
                    @if (session('message'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
                        {{ session('message') }}
                    </div>
                @endif                     
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" placeholder="Username"  name="username">
                        </div>
                    </div>
                    <div class="form-group ">
                        
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="Password"  name="password">                        </div>
                    </div>
                    
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button class="btn btn-purple w-md" type="submit">Log In</button>
                        </div>
                    </div>
                    
               {{ Form::close() }}

            </div>
        </div>

    


        <!-- js placed at the end of the document so the pages load faster -->
        {{ Html::script('js/jquery.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/pace.min.js') }}
        {{ Html::script('js/wow.min.js') }}
        {{ Html::script('js/jquery.nicescroll.js') }}
       
        <!--common script for all pages-->
        {{ Html::script('js/jquery.app.js') }}

    
    </body>
</html>
