@extends('dashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="col-xs-6">
    <div class="register-box-body">
        <p class=""><h2>Add New PIN</h2></p>
        @include('partials.flash_message')
        <form action="{{url('/pin/store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <label class="control-label">How may PIN do you want to generate?</label>
                <input type="number" name="number" class="form-control" placeholder="How may PIN do you want to generate?" required="">
                <span class="glyphicon glyphicon-check form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="ion-key"></i> GENERATE</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
        </div>
        </section>

@endsection