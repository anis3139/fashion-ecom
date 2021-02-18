<!-- Modal -->
<div class="modal fade" id="addNote-{{ $v_allorder->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Add Note</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.order.note') }}" method="post">
                    @csrf

                    <input type="hidden" name="order_id" value="{{ $v_allorder->id }}">

                    <div class="form-group">
                        <textarea name="note" class="form-control" placeholder="add your important note" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
