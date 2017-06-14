@extends('dashboard.app')
@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            All App users information
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">App Users</a></li>
            <li class="active">view</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    @include('flash::message')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>PIN</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($app_users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->pin}}</td>
                                    <td>@if($user->status == 0) Active @else Inactive @endif</td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$user->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                        <!-- Edit form-->
                                        @include('app_user.edit')
                                    </td>

                                    <td>
                                        <form method="GET" action="{{url('/app_user/delete/'.base64_encode($user->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('delete_confirm.delete_confirm')
@endsection


@section('footer')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@stop