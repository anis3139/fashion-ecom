<div class="modal fade" id="orderNowModal-{{ $v_categoryProduct->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Just give us your mobile number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="user_from">
                    @php
                        $total = 0;
                    @endphp

                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach

                    <form action="{{ url('/quickOrderSave') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="number" class="form-control"
                                   placeholder="Type your mobile number *" required>
                        </div>

                        @if($v_categoryProduct->offer_price)
                            <input type="hidden" id="grandTotalSave" value="{{ $v_categoryProduct->offer_price }}"
                                   name="grandTotalSave">
                        @else
                            <input type="hidden" id="grandTotalSave" value="{{ $v_categoryProduct->price }}"
                                   name="grandTotalSave">
                        @endif

                        <input type="hidden" name="month" value="{{ date('F') }}">
                        <input type="hidden" name="year" value="{{ date('Y') }}">
                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">

                        <button type="button" class="btn btn-secondary"  style="padding: 2.5px 19px;" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
