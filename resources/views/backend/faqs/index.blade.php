@extends('backend.layouts.app')

@section('title', 'FAQs')

@section('content')

    <x-backend.breadcrumb page_name="FAQs"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.faqs.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New FAQ
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.faqs.filter') }}" method="POST" class="filter-form">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-5">
                            <input type="text" class="form-control" name="question" value="{{ $question ?? '' }}" placeholder="Question">
                        </div>

                        <div class="col-5">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
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
                            <th scope="col">Language</th>
                            <th scope="col">Type</th>
                            <th scope="col">Question</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($faqs) > 0)
                            @foreach($faqs as $faq)
                                <tr>
                                    <td>#{{ $faq->id }}</td>
                                    <td>{{ $faq->language }}</td>
                                    <td>{{ $faq->type }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{!! $faq->status !!}</td>
                                    <td>{!! $faq->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $faqs->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="FAQ"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.faqs.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $faqs->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush