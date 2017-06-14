@extends('dashboard.app')
@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->


    <section class="content">
    <div class="col-xs-6">
    <div class="register-box-body">
        <p class=""><h1>Add New App User</h1></p>
        @include('partials.flash_message')
        <form action="{{url('/app_user/store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" required="" value="{{old('name')}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <select name="pin" required="" class="form-control">
                    <option value="">Select Pin</option>
                    @foreach($Pins as $pin)
                        <option value="{{$pin->code}}">{{$pin->code}} =>
                            @if($pin->use_status == 0)<span class="label label-success"> Available</span> @else <span class="label label-danger">Not Available </span>@endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Create</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
        </div>
        </section>

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