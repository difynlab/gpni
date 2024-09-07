@extends('backend.layouts.app')

@section('title', 'Gift Card Orders')

@section('content')

    <x-backend.breadcrumb page_name="Gift Card Orders"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.orders.gift-card-orders.filter') }}" method="POST" class="filter-form">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col">
                            <input type="text" class="form-control" name="reference_code" value="{{ $reference_code ?? '' }}" placeholder="Reference Code">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="buyer_receiver_name" value="{{ $buyer_receiver_name ?? '' }}" placeholder="Buyer/ receiver name">
                        </div>

                        <div class="col">
                            <input type="date" class="form-control" name="date" value="{{ $date ?? '' }}" placeholder="Date">
                        </div>

                        <div class="col-2 d-flex justify-content-between">
                            <button type="submit" class="filter-search-button" name="action" value="search">SEARCH</button>

                            <button type="submit" class="filter-reset-button" name="action" value="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Reference Code</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Receiver Email</th>
                            <th scope="col">Buyer Name</th>
                            <th scope="col">Buyer Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($gift_card_orders) > 0)
                            @foreach($gift_card_orders as $gift_card_order)
                                <tr>
                                    <td>#{{ $gift_card_order->id }}</td>
                                    <td>{{ $gift_card_order->reference_code }}</td>
                                    <td>{{ $gift_card_order->amount }}</td>
                                    <td>{{ $gift_card_order->receiver_name }}</td>
                                    <td>{{ $gift_card_order->receiver_email }}</td>
                                    <td>{{ $gift_card_order->buyer_name }}</td>
                                    <td>{{ $gift_card_order->buyer_email }}</td>
                                    <td>{{ $gift_card_order->date }}</td>
                                    <td>{!! $gift_card_order->payment_status !!}</td>
                                    <td>{!! $gift_card_order->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $gift_card_orders->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Gift Card Order"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.orders.gift-card-orders.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $gift_card_orders->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush