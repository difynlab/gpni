@if(session('complete'))
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="confirmation-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="modal-body">
                <h1>Awesome!</h1>
                <p>{{ session('complete') }}</p>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('fail'))
<div class="modal fade" id="failedNotificationModal" tabindex="-1" aria-labelledby="failedNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="failed-notification-icon">
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-body">
                <h1>Oops!</h1>
                <p>{{ session('fail') }}</p>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endif

@push('after-scripts')
<script>
    $(document).ready(function() {
        // For success notification
        if ($('#notificationModal').length) {
            var myModal = new bootstrap.Modal(document.getElementById('notificationModal'));
            myModal.show();
        }
        
        // For failure notification
        if ($('#failedNotificationModal').length) {
            var myModal = new bootstrap.Modal(document.getElementById('failedNotificationModal'));
            myModal.show();
        }
    });
</script>
@endpush