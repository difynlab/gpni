<nav class="sidebar">
    <a href="{{ route('backend.dashboard.index') }}">
        <img src="{{ asset('storage/backend/logo.png') }}" alt="Logo" class="logo">
    </a>

    <div class="gradient-line"></div>

    <div class="scroll-bar">
        <ul class="components">
            <li>
                <a href="{{ route('backend.dashboard.index') }}" class="link {{ Request::segment(2) == 'dashboard' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/dashboard.png') }}" alt="Icon">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.pages.index') }}" class="link {{ Request::segment(2) == 'pages' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                    <span>Pages</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.conferences.index') }}" class="link {{ Request::segment(2) == 'conferences' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/conference.png') }}" alt="Icon">
                    <span>Conferences</span>
                </a>
            </li>

            <div class="accordion" id="article-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#article-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                    <span>Articles</span>
                </button>

                <div id="article-data-collapse" class="accordion-collapse collapse {{ Request::segment(2) == 'article-categories' || Request::segment(2) == 'articles' ? 'show' : '' }}" data-bs-parent="#article-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.article-categories.index') }}" class="link {{ Request::segment(2) == 'article-categories' ? 'active' : null }}">Article Categories</a></li>

                            <li><a href="{{ route('backend.articles.index') }}" class="link {{ Request::segment(2) == 'articles' ? 'active' : null }}">Articles</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ route('backend.courses.index') }}" class="link {{ Request::segment(2) == 'courses' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                    <span>Courses</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.course-promotions.index') }}" class="link {{ Request::segment(2) == 'course-promotions' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/course-promotion.png') }}" alt="Icon">
                    <span>Course Promotions</span>
                </a>
            </li>

            <div class="accordion" id="product-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#product-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                    <span>Products</span>
                </button>

                <div id="product-data-collapse" class="accordion-collapse collapse {{ Request::segment(2) == 'product-categories' || Request::segment(2) == 'products' ? 'show' : '' }}" data-bs-parent="#product-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.product-categories.index') }}" class="link {{ Request::segment(2) == 'product-categories' ? 'active' : null }}">Product Categories</a></li>

                            <li><a href="{{ route('backend.products.index') }}" class="link {{ Request::segment(2) == 'products' ? 'active' : null }}">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/media.png') }}" alt="Icon">
                    <span>Medias</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/marketing.png') }}" alt="Icon">
                    <span>Marketings</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/coupon.png') }}" alt="Icon">
                    <span>Coupons</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/gift-card.png') }}" alt="Icon">
                    <span>Gift Cards</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                    <span>Orders</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.users.index') }}" class="link {{ Request::segment(2) == 'users' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                    <span>Users</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/partner.png') }}" alt="Icon">
                    <span>Partners</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.testimonials.index') }}" class="link {{ Request::segment(2) == 'testimonials' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/testimonial.png') }}" alt="Icon">
                    <span>Testimonials</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.faqs.index') }}" class="link {{ Request::segment(2) == 'faqs' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/faq.png') }}" alt="Icon">
                    <span>FAQs</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                    <span>Communications</span>
                </a>
            </li>

            <li>
                <a href="#" class="link {{ Request::segment(2) == '' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/currency.png') }}" alt="Icon">
                    <span>Currencies</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.settings.index') }}" class="link {{ Request::segment(2) == 'settings' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>