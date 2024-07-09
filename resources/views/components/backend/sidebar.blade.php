<nav class="sidebar">
    <a href="{{ route('backend.dashboard.index') }}">
        <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="logo">
    </a>

    <div class="gradient-line"></div>

    <div class="scroll-bar">
        <ul class="components">
            <li>
                <a href="{{ route('backend.dashboard.index') }}" class="link {{ Request::segment(2) == 'dashboard' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/dashboard.png') }}" alt="Icon">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.pages.index') }}" class="link {{ Request::segment(2) == 'pages' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/page.png') }}" alt="Icon">
                    <span>Pages</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/conference.png') }}" alt="Icon">
                    <span>Conferences</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/article.png') }}" alt="Icon">
                    <span>Articles</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.courses.index') }}" class="link {{ Request::segment(2) == 'courses' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/course.png') }}" alt="Icon">
                    <span>Courses</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/product.png') }}" alt="Icon">
                    <span>Product</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/discount.png') }}" alt="Icon">
                    <span>Discounts</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/media.png') }}" alt="Icon">
                    <span>Media</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/marketing.png') }}" alt="Icon">
                    <span>Marketing</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/coupon.png') }}" alt="Icon">
                    <span>Coupons</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/gift-card.png') }}" alt="Icon">
                    <span>Gift Cards</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/order.png') }}" alt="Icon">
                    <span>Orders</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.users.index') }}" class="link {{ Request::segment(2) == 'users' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/user.png') }}" alt="Icon">
                    <span>Users</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/partner.png') }}" alt="Icon">
                    <span>Partners</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/testimonial.png') }}" alt="Icon">
                    <span>Testimonials</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/faq.png') }}" alt="Icon">
                    <span>FAQs</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/communication.png') }}" alt="Icon">
                    <span>Communication</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/currency.png') }}" alt="Icon">
                    <span>Currency</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.settings.index') }}" class="link {{ Request::segment(2) == 'settings' ? 'active' : null }}">
                    <img src="{{ asset('storage/sidebar/settings.png') }}" alt="Icon">
                    <span>Settings</span>
                </a>
            </li>
        </ul>

        <!-- <ul class="components">
            <div class="row align-items-center">
                <div class="col-5">
                    @if(auth()->user()->profile_image != null)
                        <img src="{{ asset('storage/logo.png') }}" alt="Image" class="profile-image">
                    @else
                        <img src="{{ asset('storage/no-image.jpg') }}" alt="Image" class="profile-image">
                    @endif
                </div>
                <div class="col-7">
                    <p class="name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                    <p class="role">{{ ucfirst(auth()->user()->role) }}</p>
                    <form method="POST" action="{{ route('backend.logout') }}">
                        @csrf
                        <a href="{{ route('backend.logout') }}" class="log-out" onclick="event.preventDefault(); this.closest('form').submit();">Sign Out <i class="bi bi-arrow-right"></i></a>
                    </form>
                </div>
            </div>
        </ul> -->
    </div>
</nav>