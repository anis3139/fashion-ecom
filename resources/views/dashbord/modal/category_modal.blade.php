<!-- Modal -->
<div class="modal fade" id="categoryDetails-{{ $v_allCategory->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Category details</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item text-justify">
                        <strong>Category</strong> <br> {{ $v_allCategory->category_name }}
                    </li>
                    @if($v_allCategory->page_title)
                        <li class="list-group-item text-justify">
                            <strong>Page title</strong> <br> {{ $v_allCategory->page_title }}
                        </li>
                    @endif
                    @if($v_allCategory->description_title)
                        <li class="list-group-item text-justify">
                            <strong>Description title</strong> <br> {{ $v_allCategory->description_title }}
                        </li>
                    @endif
                    @if($v_allCategory->description)
                        <li class="list-group-item text-justify">
                            <strong>Description</strong> <br> {{ $v_allCategory->description }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
