<div class="modal fade" id="edit-{{$material->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>CHANGE COURSE MATERIAL</h4>
            </div>
            <form action="{{url('/course/material/update/'.base64_encode($material->id))}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Course Code</th>
                            <td width="60%">{{$material->code->code}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<th>Body Title</th>--}}
                            {{--<td>  <input type="text" name="body_title" value="{{$material->body_title}}" id="body_title" class="form-control"></td>--}}
                        {{--</tr>--}}

                        {{--<tr><th>Sub Title</th>--}}
                            {{--<td> <input type="text" name="body_sub_title" value="{{$material->body_sub_title}}" id="body_sub_title" class="form-control"></td>--}}
                        {{--</tr>--}}
                        <tr>
                            <th>File (.jpeg, .png)</th>
                            <td>
                                    <input type="file" name="course_file_name" class="form-control"  value="{{old('course_file_name')}}">
                            </td>
                        </tr>
                        {{--<tr>--}}
                            {{--<th>Body content</th>--}}
                            {{--<td>--}}
                                {{--<textarea id="editor1" dirname="" name="body_content" rows="10" cols="80" placeholder="Enter content text here">--}}
                                {{--{{$material->body_content}}--}}
                            {{--</textarea>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Update Material</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->