<div class="modal fade" id="edit-{{$pin->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>Send PIN to User</h4>
            </div>
            <form action="{{url('/pin/send_pin/'.base64_encode($pin->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">PIN</th>
                            <td width="60%">{{$pin->code}}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td> <input name="phone" type="number" value="{{old('phone')}}" class="form-control" placeholder="Phone No." required="" style="width: 80%"></td>
                        </tr>
                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Send PIN </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->