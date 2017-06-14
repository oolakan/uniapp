<div class="modal fade" id="edit-{{$code->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>MODIFY COURSE CODE</h4>
            </div>
            <form action="{{url('/course/code/update/'.base64_encode($code->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Code</th>
                            <td width="60%"><input name="code" type="text" value="{{$code->code}}" class="form-control" placeholder="Name" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td> <input name="title" type="text" value="{{$code->title}}" class="form-control" placeholder="Email" required="" style="width: 80%"></td>
                        </tr>
                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Update Course Code</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->