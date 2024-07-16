@extends('backend.layouts.app')

@section('title', 'Course Promotions')

@section('content')

    <x-backend.breadcrumb page_name="Course Promotions"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.course-promotions.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Promotion
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type</th>
                            <th scope="col">Title</th>
                            <th scope="col">Coupon Code Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_promotions) > 0)
                            @foreach($course_promotions as $course_promotion)
                                <tr>
                                    <td>#{{ $course_promotion->id }}</td>
                                    <td>{{ $course_promotion->type }}</td>
                                    <td>{{ $course_promotion->title ?? '-' }}</td>
                                    <td>{{ $course_promotion->coupon_code_type ?? '-' }}</td>

                                    @if($course_promotion->type == 'Course Discount')
                                        <td>USD {{ $course_promotion->value }}</td>
                                    @else
                                        @if($course_promotion->coupon_code_type == 'Percentage')
                                            <td>{{ $course_promotion->value }} %</td>
                                        @else
                                            <td>USD {{ $course_promotion->value }}</td>
                                        @endif
                                    @endif
                                    
                                    <td>{!! $course_promotion->status !!}</td>
                                    <td>{!! $course_promotion->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $course_promotions->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Course Promotion"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.course-promotions.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_promotions->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush