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
    <div class="col-xs-12">
        <div class="register-box-body">
            <p class=""><h2>Course Material</h2></p>
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Course Code</th>
                            <td width="60%">{{$material->code->code}}</td>
                        </tr>
                        <tr>
                            <th>Body Title</th>
                            <td>  {{$material->body_title}}</td>
                        </tr>

                        <tr><th>Sub Title</th>
                            <td> {{$material->body_sub_title}}</td>
                        </tr>
                        <tr>
                            <th>Body content</th>
                            <td>
                                <textarea id="editor1" disabled dirname="" name="body_content" rows="10" cols="80">
                                {{$material->body_content}}
                            </textarea>
                            </td>
                        </tr>
                    </table>
                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</section>
@endsection