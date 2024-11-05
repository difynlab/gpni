@extends('backend.layouts.app')

@section('title', 'ISSN Partners')

@section('content')

    <x-backend.breadcrumb page_name="ISSN Partners"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.persons.issn-partners.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New ISSN Partner
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.persons.issn-partners.filter') }}" method="POST" class="filter-form">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-9">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
                        </div>

                        <div class="col-3 d-flex justify-content-between">
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
                            <th scope="col">Image</th>
                            <th scope="col">Language</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($issn_partners) > 0)
                            @foreach($issn_partners as $issn_partner)
                                <tr>
                                    <td>#{{ $issn_partner->id }}</td>
                                    <td>{!! $issn_partner->image !!}</td>
                                    <td>{{ $issn_partner->language }}</td>
                                    <td>{!! $issn_partner->status !!}</td>
                                    <td>{!! $issn_partner->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $issn_partners->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="ISSN Partner"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.persons.issn-partners.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $issn_partners->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush