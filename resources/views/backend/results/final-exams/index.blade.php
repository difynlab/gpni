@extends('backend.layouts.app')

@section('title', 'Final Exam Results')

@section('content')

    <x-backend.breadcrumb page_name="Final Exam Results"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.exam-results.final-exam-filter') }}" method="POST" class="filter-form">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-5">
                            <input type="text" class="form-control" name="user" value="{{ $user ?? '' }}" placeholder="User">
                        </div>

                        <div class="col-5">
                            <input type="text" class="form-control" name="course" value="{{ $course ?? '' }}" placeholder="Course">
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
                            <th scope="col">User</th>
                            <th scope="col">Course</th>
                            <th scope="col">Marks (%)</th>
                            <th scope="col">Result</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($results) > 0)
                            @foreach($results as $result)
                                <tr>
                                    <td>#{{ $result->id }}</td>
                                    <td>{{ $result->user_id }}</td>
                                    <td>{{ $result->course_id }}</td>
                                    <td>{{ $result->marks }}</td>
                                    <td>{!! $result->result !!}</td>
                                    <td>{!! $result->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $results->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Final Exam Result"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.exam-results.final-exam-result-destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $results->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush