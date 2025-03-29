@extends('backend.layouts.app')

@section('title', 'CEC Points')

@section('content')

    <x-backend.breadcrumb page_name="CEC Points: {{ $user->first_name }} {{ $user->last_name }}"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-6">
                <button class="add-button">Total CEC Points: {{ $user->cec_balance }}</button>
            </div>

            <div class="col-6 text-end">
                <button type="button" class="add-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add CEC Point</button>
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
                                <th scope="col">Course/ Activity</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Admin Comment</th>
                                <th scope="col">User Comment</th>
                                <th scope="col">Points</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($activities) > 0)
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>#{{ $activity->id }}</td>
                                        <td>{{ $activity->course_id != 'None of These' ? App\Models\Course::find($activity->course_id)->title : $activity->activity_name }}</td>
                                        <td>{{ $activity->type }}</td>
                                        <td>{{ $activity->date }}</td>
                                        <td>{{ $activity->time }}</td>
                                        <td>{{ $activity->admin_comment ?? '-' }}</td>
                                        <td>{{ $activity->user_comment ?? '-' }}</td>
                                        <td>{{ $activity->points }}</td>
                                        <td>{!! $activity->status == '1' ? 
                                            '<div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" id="'.$activity->id.'" type="checkbox" role="switch" checked>
                                                <img src="'.asset('storage/backend/common/spinner.gif').'" alt="Loading..." class="spinner">
                                            </div>' 
                                            : 
                                            '<div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" id="'.$activity->id.'" type="checkbox" role="switch">
                                                <img src="'.asset('storage/backend/common/spinner.gif').'" alt="Loading..." class="spinner">
                                            </div>' !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" style="text-align: center;">No data available in table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $activities->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <form action="{{ route('backend.persons.users.cec-points.store', $user) }}" method="POST">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add CEC Points</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row form-input">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                                        <select class="form-control form-select" id="type" name="type" required>
                                            <option value="">Select type</option>
                                            <option value="Addition" {{ old('type') == 'Addition' ? 'selected' : '' }}>Addition</option>
                                            <option value="Deduction" {{ old('type') == 'Deduction' ? 'selected' : '' }}>Deduction</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="points" class="form-label">Number of CEC Points<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="points" name="points" value="{{ old('points') }}" placeholder="Number of CEC Points" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="course_id" class="form-label">Course<span class="asterisk">*</span></label>
                                        <select class="form-control form-select" id="course_id" name="course_id" required>
                                            <option value="">Select course</option>
                                            @foreach($cec_courses as $cec_course)
                                                <option value="{{ $cec_course->id }}" {{ old('cec_course') == $cec_course->id ? 'selected' : '' }}>{{ $cec_course->title }}</option>
                                            @endforeach

                                            <option value="None of These">None of These</option>
                                        </select>
                                    </div>

                                    <div class="mb-4 activity-div d-none">
                                        <label for="activity_name" class="form-label">Activity Name<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="activity_name" name="activity_name" value="{{ old('activity_name') }}" placeholder="Activity Name">
                                    </div>

                                    <div>
                                        <label for="admin_comment" class="form-label">Comment</label>
                                        <textarea name="admin_comment" class="form-control textarea" id="admin_comment" value="{{ old('admin_comment') }}" placeholder="Comment" rows="5">{{ old('admin_comment') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $activities->url(1) !!}&items=" + this.value; 
            });

            let user = "{{ $user->id }}";
            let routeTemplate = '{{ route("backend.persons.users.cec-points.update", [":user", ":id"]) }}';
            let csrfToken = '{{ csrf_token() }}';

            updateStatusToggle(routeTemplate, csrfToken, user);
        });

        $('#course_id').on('change', function() {
            let value = $(this).val();
            
            if(value == 'None of These') {
                $('.activity-div').removeClass('d-none');
                $('.activity-div input').attr('required', true);
            }
            else {
                $('.activity-div').addClass('d-none');
                $('.activity-div input').attr('required', false);
            }
        });
    </script>
@endpush