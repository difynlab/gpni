@extends('backend.layouts.app')

@section('title', 'Show Purchase')

@section('content')

    <x-backend.breadcrumb page_name="Show Purchase"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.purchases.material-purchases.refund-status', $material_purchase->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                            <input class="form-control" value="{{ $material_purchase->date }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Currency</label>
                            <input class="form-control" value="{{ strtoupper($material_purchase->currency) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Time</label>
                            <input class="form-control" value="{{ $material_purchase->time }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Mode</label>
                            <input class="form-control" value="{{ ucfirst($material_purchase->mode) }}" readonly>
                        </div>

                        <div>
                            <label class="form-label">Transaction ID</label>
                            <input class="form-control" value="{{ $material_purchase->transaction_id }}" readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Course</label>
                            <input class="form-control" value="{{ $course }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Amount Paid</label>
                            <input class="form-control" value="{{ $material_purchase->currency === 'usd' ? '$' : '¥' }}{{ $material_purchase->amount_paid }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Discount Applied</label>
                            <input class="form-control" value="{{ $material_purchase->discount_applied }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Status</label>
                            <input class="form-control" value="{{ $material_purchase->payment_status }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Receipt URL</label>
                            <input class="form-control" value="{{ $material_purchase->receipt_url }}" readonly>
                        </div>

                        <div style="background: #fffbea; border: 1px solid #f0c040; border-radius: 8px; padding: 12px;">
                            <label class="form-label"><i class="bi bi-pencil-fill" style="font-size: 12px;"></i> Refund Status</label>
                            <select class="form-control" name="refund_status">
                                <option value="Not Refunded" {{ $material_purchase->refund_status != 'Refunded' ? 'selected' : '' }}>Not Refunded</option>
                                <option value="Refunded" {{ $material_purchase->refund_status == 'Refunded' ? 'selected' : '' }}>Refunded</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save Updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection
