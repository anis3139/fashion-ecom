<!-- Modal -->
<div class="modal fade" id="editSiteInfo-{{ $row->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Site Information</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="">
                        <form method="POST" action="{{ route('site.info.update', $row->id) }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Mobile One</label>
                                    <input type="text" name="mobile_one" value="{{ $row->mobile_one }}" class="form-control" placeholder="Entry mobile number">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Mobile Two</label>
                                    <input type="text" name="mobile_two" value="{{ $row->mobile_two }}" class="form-control" placeholder="Entry mobile two">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $row->address }}" class="form-control" placeholder="Entry address">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Mail One</label>
                                    <input type="text" name="mail_one" value="{{ $row->mail_one }}" class="form-control" placeholder="Entry mail one">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Mail Two</label>
                                    <input type="text" name="mail_two" value="{{ $row->mail_two }}" class="form-control" placeholder="Entry mail two">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Mail Three</label>
                                    <input type="text" name="mail_three" value="{{ $row->mail_three }}" class="form-control" placeholder="Entry mail three">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
