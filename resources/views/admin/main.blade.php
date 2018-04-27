<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>SmartValet - @yield('title')</title>

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

        <!-- sweet alerts -->
        {{Html::style('css/sweet-alert/sweet-alert.min.css')}}
        
        <!-- Custom styles for this template -->
        {{Html::style('css/style.css')}}
        {{Html::style('css/helper.css')}}
        


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="index.html" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">SmartValet</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                        {{Html::link('admin/dashboard','Dashboard')}}
                    </li>
<!--                    <li class="{{Request::is('admin/projects') ? 'active' : ''}}">
                        {{Html::link('admin/projects','Buildings')}}
                    </li>-->
                    <li class="{{Request::is('admin/users') ? 'active' : ''}}">
                        {{Html::link('admin/users','Users')}}
                    </li>
                    
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                
                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    

                    <!-- Right navbar -->
                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu">  
                        
                        <!-- /Notification -->

                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">{{ Session::get('usernm')}}</span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <li>{{Html::link('admin/logout','Logout')}}</li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->       
                    </ul>
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->
            
            <div class="wraper container-fluid">
                <!-- Main content section-->
                    @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
                        {{ session('message') }}
                    </div>
                @endif
                    @yield('content')
            
        </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <footer class="footer">
                2015 © Velonic.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        {{ Html::script('js/jquery.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/pace.min.js') }}
        {{ Html::script('js/wow.min.js') }}
        {{ Html::script('js/jquery.nicescroll.js') }}
        
        {{Html :: script('js/jquery.validate/jquery.validate.min.js')}}
        {{Html :: script('js/jquery.validate/form-validation-init.js')}}
        
        {{Html :: script('js/sweet-alert/sweet-alert.min.js')}}
        {{Html :: script('js/sweet-alert/sweet-alert.init.js')}}

    </body>
</html>