<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easy Study</title>
    @yield('header')
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->



    <![endif]-->

</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>S</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Easy</b>Study</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->


                    <!-- Tasks: style can be found in dropdown.less -->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    <small>{{\Illuminate\Support\Facades\Auth::user()->email}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="{{url('/dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Admin</span>
            <span class="pull-right-container">
                <span class="label label-success pull-right">{{count($Users)}}</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/users')}}"><i class="fa fa-circle-o"></i>View Admins</a></li>
                        <li><a href="{{url('/users/create')}}"><i class="fa fa-circle-o"></i>Add New Admin</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>App Users</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right">{{count($app_users)}}</span>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/app_user')}}"><i class="fa fa-circle-o"></i>View App Users</a></li>
                        <li><a href="{{url('/app_user/create')}}"><i class="fa fa-circle-o"></i>Add New App User</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Course Codes</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{count($Codes)}}</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/course/code')}}"><i class="fa fa-circle-o"></i>View Course Codes</a></li>
                        <li><a href="{{url('/course/code/create')}}"><i class="fa fa-circle-o"></i>Add New Course Code</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Course Materials</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{count($Materials)}}</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/course/material')}}"><i class="fa fa-circle-o"></i>View Course Materials</a></li>
                        <li><a href="{{url('/course/material/create')}}"><i class="fa fa-circle-o"></i>Add New Material</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-key"></i>
                        <span>Authentication PIN</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{count($Pins)}}</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/pin')}}"><i class="fa fa-circle-o"></i>View PIN</a></li>
                        <li><a href="{{url('/pin/create')}}"><i class="fa fa-circle-o"></i>Add New PIN(s)</a></li>
                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>EasyStudy © 2017 </strong> All rights reserved.
    </footer>

    <!-- /#page-wrapper -->
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        jQuery(document).ready(function($){
            $('#confirmDelete').on('show.bs.modal', function (e) {
                $message = $(e.relatedTarget).attr('data-message');
                $(this).find('.modal-body p').text($message);
                $title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-title').text($title);

                // Pass form reference to modal for submission on yes/ok
                var form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-footer #confirm').data('form', form);
            });
            <!-- Form confirm (yes/ok) handler, submits form -->
            $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
                $(this).data('form').submit();
            });

            $(".select2").select2();
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });

    </script>
</div>

@yield('footer')

<!-- /#wrapper -->
{{--@yield('footer')--}}

</body>
</html>