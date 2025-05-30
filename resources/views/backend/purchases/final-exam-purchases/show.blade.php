@extends('backend.layouts.app')

@section('title', 'Show Purchase')

@section('content')

    <x-backend.breadcrumb page_name="Show Purchase"></x-backend.breadcrumb>

    <div class="static-pages">
        <form>
            <div class="section">
                <p class="inner-page-title">Purchase Details</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Student</label>
                            <input class="form-control" value="{{ $student }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Date</label>
                            <input class="form-control" value="{{ $final_exam_purchase->date }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Currency</label>
                            <input class="form-control" value="{{ strtoupper($final_exam_purchase->currency) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Time</label>
                            <input class="form-control" value="{{ $final_exam_purchase->time }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Mode</label>
                            <input class="form-control" value="{{ ucfirst($final_exam_purchase->mode) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Transaction ID</label>
                            <input class="form-control" value="{{ $final_exam_purchase->transaction_id }}" readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Course</label>
                            <input class="form-control" value="{{ $course }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Amount Paid</label>
                            <input class="form-control" value="{{ $final_exam_purchase->currency === 'usd' ? '$' : '¥' }}{{ $final_exam_purchase->amount_paid }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Discount Applied</label>
                            <input class="form-control" value="{{ $final_exam_purchase->discount_applied }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Status</label>
                            <input class="form-control" value="{{ $final_exam_purchase->payment_status }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Receipt URL</label>
                            <input class="form-control" value="{{ $final_exam_purchase->receipt_url }}" readonly>
                        </div>

                        <div>
                            <label class="form-label">Refund Status</label>
                            <input class="form-control" value="{{ $final_exam_purchase->refund_status }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection