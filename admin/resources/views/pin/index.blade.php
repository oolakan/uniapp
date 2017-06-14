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
            Authorization PIN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Authorization PIN</a></li>
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

                        <table id="example1" class="table table-striped">
                            <thead>
                            @if(count($Pins) > 0)
                            <tr>
                                <th> <form method="GET" action="{{url('/pin/delete')}}" accept-charset="UTF-8" style="display:inline">
                                        <button class="btn btn-danger pull-left" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Code" data-message="Are you sure you want to delete all these PIN ?">
                                            <i class="glyphicon glyphicon-trash"></i> Delete All
                                        </button>
                                    </form></th>
                                <th></th>
                            </tr>
                            @endif
                            <tr>
                                <th>PIN</th>
                                <th>Use Status</th>
                                <th>Availability Status</th>
                                <th>Send Via Sms</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Pins as $pin)
                                <tr>
                                    <td>{{$pin->code}}</td>
                                    <td>@if($pin->use_status == 0)<span class="label label-info"> Not Used</span> @else <span class="label label-danger"> Used </span>@endif</td>
                                    <td>@if($pin->availability_status == 0)<span class="label label-success"> Available</span> @else <span class="label label-danger">Not Available </span>@endif</td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$pin->id}}"><i class="fa fa-pencil"></i> Send PIN </a>
                                        <!-- Edit form-->
                                        @include('pin.send_pin')
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/pin/delete/'.base64_encode($pin->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Code" data-message="Are you sure you want to delete this PIN ?">
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