@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

{{-- <form action="{{ url('autosearch') }}" method="post"> --}}
<form action="{{ url('search') }}" method="get">
    @csrf
    <div class="input-group  mt-2">
        <div class="input-group">
            <input type="text" name="query" class="form-control">
            <div class="input-group-append">
                <button type="type" class="btn btn-outline-secondary"><i class="fas fa-search text-grey"
                                                                         aria-hidden="true"></i></button>
                <button style="background: #f58c00;color:#333;border: none;" type="button"
                        class="btn btn-default text-white" data-toggle="modal" data-target="#exampleModal">
                    Filter <i class="fas fa-angle-down"></i>
                </button>
            </div>
        </div>

</form>
<div class="filter_search">
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php
                $allCategory = App\category::all();
                $sub_categories = App\subCategory::all();

                ?>
                <form action="{{url('filter')}}" method="post">
                    @csrf
                    <div class="modal-body row">
                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Category Name</label>
                            <select name="categoryID" class="form-control" required="">
                                <option>--Select Category--</option>
                                @foreach($allCategory as $v_promoteCategory)
                                    <option
                                        value="{{$v_promoteCategory->id}}">{{$v_promoteCategory->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Sub Category Name</label>
                            <select name="subCategoryId" class="form-control" required="">
                                <option>--Select Sub Category--</option>
                                @foreach($sub_categories as $v_sub_categories)
                                    <option
                                        value="{{$v_sub_categories->id}}">{{$v_sub_categories->subCategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Price</label>
                            <input type="number" name="price (min-mex)" class="form-control" placeholder="price"
                                   required="">
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="filterSearch btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $("#search").autocomplete({

                source: function (request, response) {
                    $.ajax({
                        url: "{{url('autocomplete')}}",
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function (data) {
                            var resp = $.map(data, function (obj) {
                                //console.log(obj.city_name);
                                return obj.name;
                            });

                            response(resp);
                        }
                    });
                },
                minLength: 1
            });
        });

    </script>
@endpush
