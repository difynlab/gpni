<button class="sidebar-toggle" id="sidebarToggle">
    <img src="{{ asset('storage/frontend/sidebar.png') }}" alt="Toggle Menu">
</button>

<div class="col-12 col-lg-4 sidebar" id="sidebar">
    <div class="sidebar-profile-card">
        <div class="sidebar-profile-container">

            @if($student->image)
                <img src="{{ asset('storage/backend/persons/users/' . $student->image) }}" class="profile-img" alt="Profile Image">
            @else
                <img src="{{ asset('storage/backend/main/' . App\Models\Setting::find(1)->no_profile_image) }}" class="profile-img" alt="Profile Image">
            @endif

            <!-- <div class="sidebar-edit-icon">
                <img src="{{ asset('storage/frontend/edit-icon.svg') }}" alt="Edit">
            </div> -->
        </div>
        <h2 class="fs-31">{{ $student->first_name . ' ' . $student->last_name}}</h2>
        <p class="fs-20">
            <img src="{{ asset('storage/frontend/location-icon.svg') }}" class="location-icon" alt="Location" width="24"height="24">
            {{ $student->country }}
        </p>
    </div>

    <a href="{{ route('frontend.dashboard.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/dashboard-icon.svg') }}" alt="Profile Icon" width="29" height="29">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_dashboard }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.profile.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/student-profile-icon.svg') }}" alt="Profile Icon" width="28" height="28">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_student_profile }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.courses.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'courses' && Request::segment(2) == '' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/course-icon.svg') }}" alt="Courses Icon" width="30" height="30">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_courses }}</span>
        </div>
    </a>

    @php
        $student = Auth::user();

        $course_ids = App\Models\CoursePurchase::
        where('user_id', $student->id)
        ->where(function ($query) {
            $query->where('payment_status', 'Completed')
                ->orWhereNull('payment_status');
        })
        ->where('course_access_status', 'Active')
        ->where(function ($query) {
            $query->where('refund_status', 'Not Refunded')
                ->orWhereNull('refund_status');
        })
        ->where('status', '1')->pluck('course_id')->toArray();

        $courses = App\Models\Course::whereIn('id', $course_ids)->where('status', '1')->where('type', 'Small Course')->orderBy('id', 'desc')->get();
    @endphp

    @if($courses->isNotEmpty())
        <a href="{{ route('frontend.courses.gpni-tv') }}" class="sidebar-link">
            <div class="sidebar-item {{ Request::segment(1) == 'courses' && Request::segment(2) == 'gpni-tv' ? 'active' : '' }}">
                <img src="{{ asset('storage/frontend/gpnitv-icon.svg') }}" alt="Courses Icon" width="28" height="28">
                <span class="fs-20">{{ $student_dashboard_contents->sidebar_gpni_tv }}</span>
            </div>
        </a>
    @else
        <a href="{{ route('frontend.gpni-tv.index') }}" class="sidebar-link">
            <div class="sidebar-item">
                <img src="{{ asset('storage/frontend/gpnitv-icon.svg') }}" alt="Courses Icon" width="28" height="28">
                <span class="fs-20">{{ $student_dashboard_contents->sidebar_gpni_tv }}</span>
            </div>
        </a>
    @endif

    <a href="{{ route('frontend.qualifications') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'qualifications' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/qualification-icon.svg') }}" alt="Qualifications Icon" width="29" height="29">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_qualifications }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.my-storage') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'my-storage' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/storage-icon.svg') }}" alt="Study Tools Icon" width="28" height="28">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_my_storage }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.buy-study-materials') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'buy-study-materials' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/Buy-study-material-icon.svg') }}" alt="Buy Study Material Icon" width="28" height="28">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_buy_study_material }}</span>
        </div>
    </a>

    @if(auth()->user()->member == 'Yes')
        <a href="{{ route('frontend.member-corner') }}" class="sidebar-link">
            <div class="sidebar-item {{ Request::segment(1) == 'member-corner' ? 'active' : '' }}">
                <img src="{{ asset('storage/frontend/members-corner-icon.svg') }}" alt="Member Corner" width="30" height="30">
                <span class="fs-20">{{ $student_dashboard_contents->sidebar_member_corner }}</span>
            </div>
        </a>
    @else
        <a href="{{ route('frontend.membership') }}" class="sidebar-link">
            <div class="sidebar-item">
                <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Member Corner" width="28" height="28">
                <span class="fs-20">{{ $student_dashboard_contents->sidebar_member_corner }}</span>
            </div>
        </a>
    @endif

    <a href="{{ route('frontend.ask-questions.index') }}" class="sidebar-link">
        <div class="sidebar-item position-relative {{ Request::segment(1) == 'ask-questions' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/ask-the-expert-icon.svg') }}" alt="Ask the Experts Icon" width="29" height="29">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_ask_the_experts }}</span>

            @php
                $user = auth()->user()->id;
                $ask_question_ids = App\Models\AskQuestion::where('user_id', $user)->where('status', '1')->pluck('id')->toArray();

                $new_replied_questions = App\Models\AskQuestionReply::where('status', '1')
                    ->where('user_viewed', '0')
                    ->whereIn('ask_question_id', $ask_question_ids)
                    ->groupBy('ask_question_id')
                    ->selectRaw('count(*) as count')
                    ->get()
                    ->count();

                $total_count = $new_replied_questions;

            @endphp

            @if($total_count > 0)
                <p class="new-count-badge">{{ $total_count }}</p>
            @endif
        </div>
    </a>

    <a href="{{ route('frontend.technical-supports.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'technical-supports' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/technical-support-icon.svg') }}" alt="Technical Supports Icon" width="27" height="27">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_technical_supports }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.refer-friends.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'refer-friends' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/refer-a-friend-icon.svg') }}" alt="Referral Points Icon" width="27" height="27">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_refer_friends }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.wallet.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'wallet' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/wallet-icon.svg') }}" alt="Wallet Icon" width="28" height="28">
            <span class="fs-20">{{ $student_dashboard_contents->sidebar_wallet }}</span>
        </div>
    </a>
</div>

@push('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            
            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
@endpush