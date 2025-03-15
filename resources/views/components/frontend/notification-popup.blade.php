@if(session('complete'))
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="confirmation-icon mx-auto" style="background-color: #7ed321;">
                        <span>&#10003;</span>
                    </div>
                    <h1 class="fs-49 ff-poppins-medium text-dark mt-4">Awesome!</h1>
                    <p class="fs-20 ff-poppins-regular text-muted mt-3">
                        Your Purchase has been confirmed.<br>Check your email for details.
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
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="confirmation-icon mx-auto" style="background-color: #dc3545;">
                        <span>&#10007;</span>
                    </div>
                    <h1 class="fs-49 ff-poppins-medium text-dark mt-4">Oops!</h1>
                    <p class="fs-20 ff-poppins-regular text-muted mt-3">
                        Something went wrong. Please try again.
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger fs-20 ff-poppins-medium px-4 py-2" data-bs-dismiss="modal">Retry</button>
                </div>
            </div>
        </div>
    </div>
@endif