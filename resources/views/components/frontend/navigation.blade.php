<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 py-3 py-lg-2 sticky-top">
            <a href="" class="navbar-brand ps-2">
                <img src="img/logo.png" alt="Logo" width="70%" height="70%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 justify-content-end">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">Education</a>
                    <a href="service.html" class="nav-item nav-link">About</a>
                    <a href="contact.html" class="nav-item nav-link">Partners</a>
                    <a href="contact.html" class="nav-item nav-link">Nutritionists</a>
                    <!-- Search Icon -->
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-search"></i>
                    </a>
                    <!-- Cart Icon with Badge -->
                    <a href="#" class="nav-item nav-link position-relative">
                        <i class="bi bi-cart"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">0<span
                                class="visually-hidden">unread
                                messages</span></span>
                    </a>
                    <!-- Login Button -->
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="btn btn-primary px-4">Login</div>
                        </a>
                    </div>
                    <!-- Country Flag with Dropdown Icon -->
                    <!-- Trigger Modal -->
                    <div class="nav-item">
                        <a class="nav-link" href="#" id="flagModalTrigger" role="button" data-bs-toggle="modal"
                            data-bs-target="#countrySelectModal">
                            <div class="flag">
                                <span class="flag-icon">
                                    <img src="img/united-states.webp" alt="United States Flag" width="25px"
                                        height="18px">
                                </span>
                                <i class="bi bi-chevron-down" style="font-size: 0.7rem; color: black;"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Modal Start-->
        <div class="modal fade" id="countrySelectModal" tabindex="-1" aria-labelledby="countrySelectModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-center py-5" id="countrySelectModalLabel" style="flex-grow: 1;">
                            Select Your Location</h1>
                        <button type="button" class="btn-close position-absolute btn-close-custom"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="form-group px-2 py-3 flex-grow-1" style="max-width: 500px;">
                                <input type="text" class="form-control search-input" id="searchCountry"
                                    placeholder="Search for country">
                            </div>
                            <!-- Filter Icon -->
                            <div class="filter-icon d-flex align-items-center px-2">
                                <img src="img/filter.svg" alt="Filter Icon" class="img-fluid" style="max-height: 32px;">
                            </div>
                        </div>

                        <div class="countries-container"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End-->
    </div>
</div>