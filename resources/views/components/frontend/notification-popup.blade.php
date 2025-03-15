@if(session('complete'))
    <div class="container d-flex justify-content-center align-items-center min-vh-100 purchase-modal-popup">
        <div class="confirmation-box col-md-6 col-lg-4">
            <div class="confirmation-icon" style="background-color: #0040c3;">
                <span>&#10003;</span>
            </div>
            <h1>Awesome!</h1>
            <p>{{ session('complete') }}</p>
            <button class="btn btn-success" style="background-color: #0040c3;" onclick="closePopup()">OK</button>
        </div>
    </div>
@endif

@if(session('fail'))
    <div class="container d-flex justify-content-center align-items-center min-vh-100 purchase-modal-popup">
        <div class="failure-box col-md-6 col-lg-4">
            <div class="failure-icon">
                <span>&#10007;</span>
            </div>
            <h1>Oops!</h1>
            <p>{{ session('fail') }}</p>
            <button class="btn btn-danger" onclick="closePopup()">Retry</button>
        </div>
    </div>
@endif