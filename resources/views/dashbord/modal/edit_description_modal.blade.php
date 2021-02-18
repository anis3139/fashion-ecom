<div class="modal fade" id="editDescriptionModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="addDescriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDescriptionModalLabel">Edit site description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('site.description.update', $row->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ $row->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="float-right btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
