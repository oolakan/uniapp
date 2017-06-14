<div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>MODIFY APP USER INFO</h4>
            </div>
            <form action="{{url('/app_user/update/'.base64_encode($user->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Name</th>
                            <td width="60%"> <input type="text" name="name" class="form-control" placeholder="Full name" required="" value="{{$user->name}}"></td>
                        </tr>
                        <tr>
                            <th>PIN</th>
                            <td> <input name="email" type="text" value="{{$user->pin}}" class="form-control" placeholder="PIN" disabled required="" style="width: 80%"></td>
                        </tr>
                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Update</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->