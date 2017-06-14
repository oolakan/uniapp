@extends('dashboard.app')

{{--@section('header')--}}
    {{--<!-- DataTables -->--}}
    {{--<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">--}}

{{--@stop--}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="col-xs-6">
    <div class="register-box-body">
        <p class=""><h2>Add New Course Material</h2></p>
        @include('partials.flash_message')
        <form action="{{url('/course/material/store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

             {{--<div class="form-group">--}}
                {{--<label>Title</label>--}}
                {{--<input type="text" name="body_title" value="{{old('body_title')}}" id="body_title" class="form-control">--}}
            {{--</div>--}}

             {{--<div class="form-group">--}}
                {{--<label>Sub Title</label>--}}
                 {{--<input type="text" name="body_sub_title" value="{{old('body_sub_title')}}" id="body_sub_title" class="form-control">--}}
            {{--</div>--}}
              <div class="form-group">
                <label>Course Material</label>
                <select class="form-control select2" style="width: 100%;" name="course_codes_id">
                        <option value="">Select course code</option>
                    @foreach($Codes as $code)
                        <option value="{{$code->id}}" @if($code->id == old('course_codes_id'))  @endif>{{$code->code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="file" name="course_file_name" class="form-control" required="" value="{{old('course_file_name')}}">
                <span class="glyphicon glyphicon-book form-control-feedback"></span>
            </div>

             {{--<div class="form-group">--}}
                {{--<label>Body</label>--}}
                 {{--<textarea id="editor1" dirname="" name="body_content" rows="10" cols="80" placeholder="Enter content text here">--}}
                 {{--{{old('body_content')}}--}}
                 {{--</textarea>--}}
                 {{--<input type="text" name="body_content"  id="body_content" class="form-control">--}}
            {{--</div>--}}

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

{{--@section('footer')--}}
    {{--<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>--}}
    {{--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>--}}
    {{--<!-- Bootstrap WYSIHTML5 -->--}}
    {{--<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--//Initialize Select2 Elements--}}
            {{--$(".select2").select2();--}}
            {{--CKEDITOR.replace('editor1');--}}
            {{--//bootstrap WYSIHTML5 - text editor--}}
            {{--$(".textarea").wysihtml5();--}}
        {{--});--}}
    {{--</script>--}}
{{--@stop--}}