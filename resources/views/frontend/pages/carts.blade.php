@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/carts.css') }}">
@endpush

@section('content')

    <div class="container-fluid my-5">
        <div class="container-fluid">
            <form action="{{ route('frontend.products.checkout') }}" method="POST">
                @csrf
                <div class="row justify-content-between mb-5">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card">
                            <h5 class="section-header fs-25">{{ $contents->{'page_items_' . $middleware_language} ?? $contents->page_items_en }} ({{ $items->count() }})</h5>

                            <hr>

                            @if($items->isNotEmpty())
                                @foreach($items as $item)
                                    <div class="d-flex align-items-center my-2">
                                        <img src="{{ asset('storage/backend/products/products/' . $item->product->thumbnail) }}" alt="{{ $item->product->name }}" class="img-fluid" style="width: 30%; height: 30%; margin-right: 20px; object-fit: cover;">

                                        <div class="item-details">
                                            <h5 class="fs-20 fw-medium">{{ $item->product->name }}</h5>

                                            @if($item->color || $item->size)
                                                <p class="fs-13">{{ $item->color }} / {{ $item->size }}</p>
                                            @endif

                                            <div class="d-flex align-items-center my-2">
                                                <i class="bi bi-dash-circle" onclick="updateQuantity({{ $item->id }}, 'decrease')" style="cursor: pointer;"></i>
                                                
                                                <span class="mx-3 fs-16" id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>

                                                <input type="hidden" name="quantities[]" id="quantity-input-{{ $item->id }}" value="{{ $item->quantity }}">

                                                <input type="hidden" name="products[]" value="{{ $item->product_id }}">

                                                <i class="bi bi-plus-circle" onclick="updateQuantity({{ $item->id }}, 'increase')" style="cursor: pointer;"></i>
                                            </div>

                                            <span class="price total-product-price fs-20" id="total-price-{{ $item->id }}">{{ $currency_symbol }}{{ $item->total_price }}</span>
                                        </div>
                                    
                                        <i class="bi bi-trash-fill fs-5" onclick="deleteItem({{ $item->id }})" style="cursor: pointer;"></i>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card mb-3">
                            <h5 class="section-header fs-25">{{ $contents->{'page_order_summary_' . $middleware_language} ?? $contents->page_order_summary_en }}</h5>
                            <div class="content">
                                <p class="fs-16">{{ $contents->{'page_no_of_items_' . $middleware_language} ?? $contents->page_no_of_items_en }}: {{ $items->sum('quantity') }}</p>

                                <p class="fs-16">{{ $contents->{'page_sub_total_' . $middleware_language} ?? $contents->page_sub_total_en }}: <span class="sub-total-price">{{ $currency_symbol }}{{ number_format($items->sum('total_price'), 2) }}</span></p>

                                <p class="fs-16">{{ $contents->{'page_shipping_fee_' . $middleware_language} ?? $contents->page_shipping_fee_en }}: <span>{{ $currency_symbol }}{{ number_format($shipping_cost, 2) }}</span></p>

                                <p class="fs-16">{{ $contents->{'page_gift_amount_' . $middleware_language} ?? $contents->page_gift_amount_en }}: <span class="gift-amount">{{ $currency_symbol }}{{ sprintf('%.2f', $wallet_balance) }}</span></p>

                                <h5 class="fs-20">{{ $contents->{'page_total_' . $middleware_language} ?? $contents->page_total_en }}: <span class="price total-price">{{ $currency_symbol }}{{ sprintf('%.2f', $total_price) }}</span></h5>
                            </div>

                            <button type="submit" class="btn btn-primary btn-custom btn-responsive">{{ $contents->{'page_button_' . $middleware_language} ?? $contents->page_button_en }}</button>
                        </div>

                        <div class="card payment-methods">
                            <h5 class="section-header fs-25">{{ $contents->{'page_we_accept_' . $middleware_language} ?? $contents->page_we_accept_en }}</h5>
                            <div class="payment-icons">
                                <img src="{{ asset('storage/frontend/visa-card.svg') }}" alt="Visa">
                                <img src="{{ asset('storage/frontend/mastercard.svg') }}" alt="MasterCard">
                                <img src="{{ asset('storage/frontend/amex.svg') }}" alt="American Express">
                                <img src="{{ asset('storage/frontend/discover.svg') }}" alt="Discover">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        function updateQuantity(itemId, action) {
            let quantityElement = document.getElementById('quantity-' + itemId);
            let quantityInputElement = document.getElementById('quantity-input-' + itemId);
            let currentQuantity = parseInt(quantityElement.innerText);

            let newQuantity = action === 'increase' ? currentQuantity + 1 : currentQuantity - 1;
            if(newQuantity < 1) return;

            quantityElement.innerText = newQuantity;
            quantityInputElement.value = newQuantity;

            let url = "{{ route('frontend.carts.update-quantity') }}";
            csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    item_id: itemId,
                    quantity: newQuantity,
                    _token: csrfToken
                },
                success: function(data) {
                    if(data.success) {
                        $('#total-price-' + itemId).html(data.currency_symbol + data.item_total_price);
                        $('.sub-total-price').html(data.currency_symbol + data.sub_total_price);
                        $('.total-price').html(data.currency_symbol + data.cart_total_price);
                    }
                    else {
                        alert('Failed to update quantity');
                    }
                },
                error: function() {
                    console.error('Error updating quantity:', error);
                }
            });
        }

        function deleteItem(itemId) {
            let url = "{{ route('frontend.carts.destroy') }}";
            csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    item_id: itemId,
                    _token: csrfToken
                },
                success: function(data) {
                    if(data.success) {
                        location.reload();
                    }
                    else {
                        alert('Failed to delete item');
                    }
                },
                error: function() {
                    console.error('Error deleting item:', error);
                }
            });
        }
    </script>
@endpush