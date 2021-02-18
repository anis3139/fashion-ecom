<!-- Modal -->
<div class="modal fade" id="thirdCategoryDetails-{{ $v_allThirdCategory->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Third category details</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item text-justify">
                        <strong>Category:</strong> {{ $v_allThirdCategory->category->category_name }}
                        <i class="fa fa-long-arrow-right"></i>
                        <strong>Sub category:</strong> {{ $v_allThirdCategory->subCategory->subCategory_name }}
                        <i class="fa fa-long-arrow-right"></i>
                        <strong>Third category:</strong> {{ $v_allThirdCategory->thirdCategoryName }}
                    </li>
                    <li class="list-group-item text-justify">
                        <strong>Page title</strong> <br> {{ $v_allThirdCategory->page_title }}
                    </li>
                    @if($v_allThirdCategory->description_title)
                        <li class="list-group-item text-justify">
                            <strong>Description title</strong> <br> {{ $v_allThirdCategory->description_title }}
                        </li>
                    @endif
                    @if($v_allThirdCategory->description)
                        <li class="list-group-item text-justify">
                            <strong>Description</strong> <br> {{ $v_allThirdCategory->description }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
