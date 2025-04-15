<div class="col-4 blue-section">
    <img src="{{ asset('storage/frontend/login-image.png') }}" alt="GPNi Logo" class="image">

    <h3 class="title">Gateway to 360°<br>Nutrition Education</h3>

    <div class="feature-section">
        <ul class="feature-list">
            <li>
                <img src="{{ asset('storage/frontend/login-tick.svg') }}" alt="Tick Icon">
                <span>Qualified Coaches</span>
            </li>
            <li>
                <img src="{{ asset('storage/frontend/login-tick.svg') }}" alt="Tick Icon">
                <span>On-Demand Learning</span>
            </li>
            <li>
                <img src="{{ asset('storage/frontend/login-tick.svg') }}" alt="Tick Icon">
                <span>Social Network</span>
            </li>
            <li>
                <img src="{{ asset('storage/frontend/login-tick.svg') }}" alt="Tick Icon">
                <span>Globally recognized certification</span>
            </li>
        </ul>
    </div>

    <div class="partners">
        <div class="swiper logos">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('storage/frontend/login-1.png') }}" alt="ISSN Logo">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('storage/frontend/login-2.png') }}" alt="IDEA Logo">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('storage/frontend/login-3.png') }}" alt="FIBO Logo">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('storage/frontend/login-4.png') }}" alt="Nike Sparq Training Logo">
                </div>
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
    <script>
        const logosSwiper = new Swiper(".logos", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000
            },
        });
    </script>
@endpush