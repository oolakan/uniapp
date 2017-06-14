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
        <p class=""><h1>Add New Admin</h1></p>
        @include('partials.flash_message')
        <form action="{{url('/users/store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" required="" value="{{old('name')}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="number" name="phone" class="form-control" placeholder="Phone" required="" value="{{old('phone')}}">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select name="roles_id" required="" class="form-control">
                    <option value="">Select Role</option>
                    @foreach($Roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group has-feedback">
                <input type="password"  name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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