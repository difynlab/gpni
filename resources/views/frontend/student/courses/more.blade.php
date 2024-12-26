@extends('frontend.layouts.app')

@section('title', 'Show Course Chapters')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-chapters.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5 ps-md-4 ps-3">
                <div class="course-details-container">
                    <a href="{{ route('frontend.courses.show', $course) }}" class="return-link pt-2">
                        <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        {{ $student_dashboard_contents->courses_return }}
                    </a>

                    <h1 class="course-title">{{ $course->title }} : {{ $course_module->title }} - {{ $course_chapter->title }}</h1>

                    <div class="title">{{ $student_dashboard_contents->courses_about }}</div>
                    <div class="content">{!! $course_chapter->about !!}</div>

                    <div class="title">{{ $student_dashboard_contents->courses_content }}</div>
                    <div class="content">{!! $course_chapter->content !!}</div>

                    <div class="title">{{ $student_dashboard_contents->courses_guides }}</div>
                    @if($books || $videos || $video_links)
                        <div class="content mt-2">
                            <div class="accordion" id="accordionContents">
                                @if($books)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBooks" aria-expanded="false" aria-controls="collapseBooks">
                                                {{ $student_dashboard_contents->courses_course_book }}
                                            </button>
                                        </h2>
                                        <div id="collapseBooks" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                            <div class="accordion-body pb-0">
                                                @foreach($books as $book)
                                                    <div class="chapter-item">
                                                        <span>{{ $book->title }}</span>
                                                        <!-- <a href="{{ asset('storage/backend/courses/course-chapter-books/' . $book->file) }}" download class="btn-download">{{ $student_dashboard_contents->courses_download }}</a> -->
                                                        <button class="btn btn-primary btn-read-document" data-book="{{ $book->file }}" data-title="{{ $book->title }}" data-type="book">{{ $student_dashboard_contents->courses_read_now }}</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($videos)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
                                                {{ $student_dashboard_contents->courses_course_video }}
                                            </button>
                                        </h2>
                                        <div id="collapseVideos" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                            <div class="accordion-body pb-0">
                                                <div class="row">
                                                    @foreach($videos as $video)
                                                        <div class="col-6 mb-3">
                                                            <p class="mb-2">{{ $video->title }}</p>
                                                            <video src="{{ asset('storage/backend/courses/course-chapter-videos/' . $video->file) }}" controls class="video-player"></video>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($video_links)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideoLinks" aria-expanded="false" aria-controls="collapseVideoLinks">
                                                {{ $student_dashboard_contents->courses_video_links }}
                                            </button>
                                        </h2>
                                        <div id="collapseVideoLinks" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                            <div class="accordion-body pb-0">
                                                <div class="row">
                                                    @foreach($video_links as $video_link)
                                                        <!-- <div class="link-item">
                                                            <a href="{{ $video_link->link }}" target="_blank">{{ $video_link->title }}</a>
                                                        </div> -->

                                                        <div class="col-6 mb-3">
                                                            <p class="mb-2">{{ $video_link->title }}</p>
                                                            <iframe src="{{ $video_link->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="no-data">{{ $student_dashboard_contents->courses_no_guides }}</p>
                    @endif

                    <div class="title">{{ $student_dashboard_contents->courses_additional_resources }}</div>
                    @if($additional_videos || $additional_video_links || $presentation_medias || $downloadable_resources)
                        <div class="content mt-2">
                            <div class="accordion" id="accordionAdditional">
                                @if($additional_videos)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdditionalVideos" aria-expanded="false" aria-controls="collapseAdditionalVideos">
                                                {{ $student_dashboard_contents->courses_additional_videos }}
                                            </button>
                                        </h2>
                                        <div id="collapseAdditionalVideos" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                            <div class="accordion-body pb-0">
                                                <div class="row">
                                                    @foreach($additional_videos as $additional_video)
                                                        <div class="col-6 mb-3">
                                                            <p class="mb-2">{{ $additional_video->title }}</p>
                                                            <video src="{{ asset('storage/backend/courses/course-chapter-additional-videos/' . $additional_video->file) }}" controls class="video-player"></video>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($additional_video_links)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdditionalVideoLinks" aria-expanded="false" aria-controls="collapseAdditionalVideoLinks">
                                                {{ $student_dashboard_contents->courses_additional_video_links }}
                                            </button>
                                        </h2>
                                        <div id="collapseAdditionalVideoLinks" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                            <div class="accordion-body pb-0">
                                                <div class="row">
                                                    @foreach($additional_video_links as $additional_video_link)
                                                        <!-- <div class="link-item">
                                                            <a href="{{ $additional_video_link }}" target="_blank">{{ $additional_video_link }}</a>
                                                        </div> -->

                                                        <div class="col-6 mb-3">
                                                            <p class="mb-2">{{ $additional_video_link->title }}</p>
                                                            <iframe src="{{ $additional_video_link->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($presentation_medias)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePresentationMedias" aria-expanded="false" aria-controls="collapsePresentationMedias">
                                                {{ $student_dashboard_contents->courses_additional_presentation_medias }}
                                            </button>
                                        </h2>
                                        <div id="collapsePresentationMedias" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                            <div class="accordion-body pb-0">
                                                @foreach($presentation_medias as $presentation_media)
                                                    <div class="chapter-item">
                                                        <span>{{ $presentation_media->title }}</span>
                                                        <!-- <a href="{{ asset('storage/backend/courses/course-chapter-presentation-medias/' . $presentation_media->file) }}" download class="btn-download">Download</a> -->
                                                        <button class="btn btn-primary btn-read-document" data-book="{{ $presentation_media->file }}" data-title="{{ $presentation_media->title }}" data-type="presentation_media">{{ $student_dashboard_contents->courses_read_now }}</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($downloadable_resources)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDownloadableResources" aria-expanded="false" aria-controls="collapseDownloadableResources">
                                                {{ $student_dashboard_contents->courses_additional_download_resources }}
                                            </button>
                                        </h2>
                                        <div id="collapseDownloadableResources" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                            <div class="accordion-body pb-0">
                                                @foreach($downloadable_resources as $downloadable_resource)
                                                    <div class="chapter-item">
                                                        <span>{{ $downloadable_resource->title }}</span>
                                                        <a href="{{ asset('storage/backend/courses/course-chapter-downloadable-resources/' . $downloadable_resource->file) }}" download class="btn-download">Download</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="no-data">{{ $student_dashboard_contents->courses_no_additional_resources }}</p>
                    @endif

                    <div class="modal fade" id="file-modal">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <script src="{{ asset('frontend/js/pdf.js') }}"></script>
                            <script src="{{ asset('frontend/js/pdf-worker.js') }}"></script>
                            <script src="{{ asset('frontend/js/canvas-pdf.js') }}"></script>

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="file-title"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="file-view">
                                    <div class='pre-loader'>
                                        <img class='loading-gif' alt='loading' src="{{ asset('storage/frontend/pre-loader.gif') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('after-scripts')
    <script>
        $('.btn-read-document').on('click', function() {

            let book = $(this).attr('data-book');
            let title = $(this).attr('data-title');
            let type = $(this).attr('data-type');
            let url = `{{ route('frontend.courses.get-file') }}`;

            $("#file-modal").modal('show');

            $.ajax({
                url: url,
                data: {
                    'book' : book,
                    'title' : title,
                    'type' : type
                },
                method:'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    $(".pre-loader").addClass('d-none');
                    $("#file-view").html(response.file_view);
                    $("#file-title").html(response.file_title);
                },
                error:function(error){
                    console.log(error);
                }
            })
        });

        $('#file-modal').on('hidden.bs.modal', function() {
            $(".pre-loader").removeClass('d-none');
        });
    </script>
@endpush