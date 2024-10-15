@extends('frontend.layouts.app')

@section('title', 'Members Corner')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/my-storage.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <div class="d-flex flex-column flex-md-row dashboard-container">
        <div class="d-flex flex-column flex-md-row">
            <nav class="sidebar">
                <div class="profile-card">
                    <div class="profile-container">
                        <img src="/storage/frontend/ellipse-2.svg" class="profile-img" alt="Profile Image">
                        <div class="edit-icon">
                            <img src="/storage/frontend/akar-icons-edit.svg" alt="Edit">
                        </div>
                    </div>
                    <h2>Tim Stevens</h2>
                    <p>
                        <img src="/storage/frontend/dashicons-location.svg" class="location-icon" alt="Location" width="24"
                            height="24">
                        China
                    </p>
                </div>
                <a href="./studentProfile.html" class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    Student Profile
                </a>
                <a href="./courseListView.html" class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    Courses
                </a>
                <a href="./qualification.html" class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    Qualifications
                </a>
                <a href="./studyMaterialMain.html" class="sidebar-item d-flex">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    Study Tools
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24" class="ml-auto">
                </a>
                <a href="./studyMaterialPaymentPortal.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Buy Study Material
                </a>
                <a href="./members.Corner.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Members Corner
                </a>

                <a href="./askTheExpert.html" class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    Ask the Experts
                </a>
                <a href="./referFriend.html" class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    Referral Points
                </a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="container-main">
                <div class="d-flex justify-content-between align-items-center mb-3" >
                    <div class="header">Members Corner</div>
                    <button class="btn add-new-button" data-toggle="modal" data-target="#newUploadModal" hidden>
                        <img src="/storage/frontend/ic-round-add.svg" alt="Add" style="width: 20px; height: 20px" class="mr-2">
                        Add New
                    </button>
                </div>
                <nav class="mb-3">
                    <ul class="tabs nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#">All</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Image</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Video</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">PDF</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">PPT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Excel</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Doc</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Audio</a></li>
                    </ul>
                </nav>
                <div class="search-field mb-3">
                    <img src="/storage/frontend/vector.svg" alt="Search">
                    <input type="text" placeholder="Search for Certificates">
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description/item details</th>
                            <th>Title</th>
                            <th hidden>Size</th>
                            <th hidden>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="/storage/frontend/16990035859 1.svg" alt="SupplySide EAST" style="width: 100px"></td>
                            <td>Test</td>
                            <td hidden>10.78Kb</td>
                            <td hidden>
                                <button class="btn btn-link"><img src="/storage/frontend/akar-icons-edit.svg" alt="Edit"
                                        style="width: 20px;"></button>
                                <button class="btn btn-link" data-toggle="modal"
                                    data-target="#deleteModal"></button><img
                                    src="/storage/frontend/solar-trash-bin-trash-linear.svg" alt="Delete"
                                    style="width: 20px;"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="/storage/frontend/image 22.svg" alt="FirstVimeo" style="width: 100px"></td>
                            <td>FirstVimeo</td>
                            <td hidden>0.00Kb</td>
                            <td hidden>
                                <button class="btn btn-link"><img src="/storage/frontend/akar-icons-edit.svg" alt="Edit"
                                        style="width: 20px;"></button>
                                <button class="btn btn-link" data-toggle="modal"
                                    data-target="#deleteModal"></button><img
                                    src="/storage/frontend/solar-trash-bin-trash-linear.svg" alt="Delete"
                                    style="width: 20px;"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination mt-3">
                    <div class="pagination-details">Showing 1 to 2 of 2 entries</div>
                    <div class="pagination-links">
                        <div class="page-link">Prev</div>
                        <div class="page-link current-page">1</div>
                        <div class="page-link">Next</div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade" id="newUploadModal" tabindex="-1" aria-labelledby="newUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUploadModalLabel">New Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control">
                                <option value="" disabled selected>Choose the appropriate type</option>
                                <!-- Other options go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter the name of the item">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="d-flex">
                                <input type="file" class="form-control" placeholder="Choose Image" style="flex: 1;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                    data-target="#fileUploadModal">
                                    <img src="/storage/frontend/ei-image.svg" alt="Upload">
                                    Upload
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="fileUploadModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <div class="header">File Upload</div>
                    <div class="upload-section">
                        <img src="/storage/frontend/upload-icon.svg" alt="Upload Icon" class="upload-icon">
                        <div class="upload-text">Drag and drop files here</div>
                        <div class="divider">
                            <div>or</div>
                        </div>
                        <button type="button" class="btn btn-primary browse-button" data-dismiss="modal"
                            data-toggle="modal" data-target="#successModal">
                            Browse File
                        </button>
                        <div class="file-size-text">Maximum file size is 200MB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="successModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <!-- Success Icon -->
                    <img src="/storage/frontend/https-lottiefiles-com-animations-successful-5-n-3-ar-jk-i-ou.svg"
                        alt="Success Icon" width="124" height="124">
                    <div class="header">Successfully Added</div>
                    <div class="subtext">New item has been added successfully</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <!-- The Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="header">Are you sure?</div>
                    <div class="subtext">This action will permanently erase all details</div>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="cancel-button" data-dismiss="modal">Cancel</button>
                        <button type="button" class="delete-button" data-toggle="modal" data-target="#deletedModal">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="deletedModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <div class="header">Successfully Deleted</div>
                    <div class="subtext">Item has been deleted successfully</div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection