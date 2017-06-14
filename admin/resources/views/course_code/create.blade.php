@extends('dashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="col-xs-6">
    <div class="register-box-body">
        <p class=""><h2>Add New Course Code</h2></p>
        @include('partials.flash_message')
        <form action="{{url('/course/code/store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="code" class="form-control" placeholder="Course code" required="" value="{{old('code')}}">
                <span class="glyphicon glyphicon-check form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="title" class="form-control" placeholder="Title" required="" value="{{old('title')}}">
                <span class="glyphicon glyphicon-book form-control-feedback"></span>
            </div>
            <input type="hidden" name="users_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
        </div>
        </section>

@endsection