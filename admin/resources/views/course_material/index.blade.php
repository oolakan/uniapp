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
            Course Materials
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Course Materials</a></li>
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
                                <th>Course Code</th>
                                {{--<th>Course Title</th>--}}
                                {{--<th>Body Content</th>--}}
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Materials as $material)
                                <tr>
                                    <td>{{$material->code->code}}</td>
                                    {{--<td>{{$material->code->title}}</td>--}}
                                    {{--<td>{{strip_tags($material->body_content)}}</td>--}}
                                   <td><a href="{{url('/course/material/show/')}}" target="_blank" class="btn btn-success"><i class="glyphicon glyphicon-book"></i> View Document</a></td>
                                    <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#edit-{{$material->id}}"><i class="glyphicon glyphicon-edit"></i> Edit Course Material</button>
                                        <!-- Edit form-->
                                        @include('course_material.edit')
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/course/material/delete/'.base64_encode($material->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Code" data-message="Are you sure you want to delete this course material ?">
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