<!-- Modal -->
<div class="modal fade" id="userData-{{ $v_allorder->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Add user information</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($v_allorder->customerInfo))
                    <form action="{{ url('userDataUpdate') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Name:</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{$v_allorder->customerInfo->name}}">
                                <input type="hidden" name="id" class="form-control"
                                       value="{{$v_allorder->customerInfo->id}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Number:</label>
                                <input type="text" name="number" class="form-control"
                                       value="{{$v_allorder->customerInfo->number}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" name="address" class="form-control"
                                   value="{{$v_allorder->customerInfo->address}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Update</button>
                    </form>
                @else
                    <div class="alert alert-primary">
                        <p>Sorry there are no data in database at the moment</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
