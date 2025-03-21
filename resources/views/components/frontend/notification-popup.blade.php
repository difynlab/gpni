@if(session('complete'))
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="confirmation-icon mx-auto" style="background-color: #0040c3;">
                        <span>&#10003;</span>
                    </div>
                    <h1 class="fs-49 ff-poppins-medium text-dark mt-4">Awesome!</h1>
                    <p class="fs-20 ff-poppins-regular text-muted mt-3">
                        {{ session('complete') }}
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary fs-20 ff-poppins-medium px-4 py-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('fail'))
    <div class="modal fade" id="failedNotificationModal" tabindex="-1" aria-labelledby="failedNotificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="failed-notification-icon mx-auto">
                        <i class="fas fa-times" style="color: white;"></i>
                    </div>

                    <h1 class="fs-49 ff-poppins-medium text-dark mt-4">Oops!</h1>
                    <p class="fs-20 ff-poppins-regular text-muted mt-3">
                        {{ session('fail') }}
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger fs-20 ff-poppins-medium px-4 py-2" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div> 
@endif

@push('after-scripts')
    <script>
        $(document).ready(function () {
            $('#notificationModal').modal('show');
        });
    </script>
@endpush