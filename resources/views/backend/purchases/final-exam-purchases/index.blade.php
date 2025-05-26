@extends('backend.layouts.app')

@section('title', 'Final Exam Purchases')

@section('content')

    <x-backend.breadcrumb page_name="Final Exam Purchases"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.purchases.final-exam-purchases.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col">
                            <input type="text" class="form-control" name="transaction_id" value="{{ $transaction_id ?? '' }}" placeholder="Transaction ID">
                        </div>

                        <div class="col">
                            <input type="date" class="form-control" name="date" value="{{ $date ?? '' }}" placeholder="Date">
                        </div>

                        <div class="col-4 col-xl-2 d-flex justify-content-between">
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
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student</th>
                            <th scope="col">Course</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($final_exam_purchases) > 0)
                            @foreach($final_exam_purchases as $final_exam_purchase)
                                <tr>
                                    <td>#{{ $final_exam_purchase->id }}</td>
                                    <td>{{ $final_exam_purchase->user_id }}</td>
                                    <td>{{ $final_exam_purchase->course_id }}</td>
                                    <td>{{ $final_exam_purchase->date_time }}</td>
                                    <td>{{ $final_exam_purchase->currency === 'usd' ? '$' : '¥' }}{{ $final_exam_purchase->amount_paid }}</td>
                                    <td>{!! $final_exam_purchase->payment_status !!}</td>
                                    <td>{!! $final_exam_purchase->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $final_exam_purchases->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Final Exam Purchase"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.purchases.final-exam-purchases.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $final_exam_purchases->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush