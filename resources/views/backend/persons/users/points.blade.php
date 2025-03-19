@extends('backend.layouts.app')

@section('title', 'Points')

@section('content')

    <x-backend.breadcrumb page_name="Points: {{ $user->first_name }} {{ $user->last_name }}"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <button class="add-button">Total Points: {{ $activities[0]->balance }}</button>
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
                                <th scope="col">Activity</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Points</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($activities) > 0)
                                @foreach($activities as $user)
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>{{ $user->activity }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->date }}</td>
                                        <td>{{ $user->time }}</td>
                                        <td>{{ $user->points }}</td>
                                        <td>{{ $user->balance }}</td>
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

                {{ $activities->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $activities->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush