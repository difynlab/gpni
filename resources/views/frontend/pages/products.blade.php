@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/products.css') }}">
@endpush

@section('content')

    <div class="container py-5">
        <x-frontend.notification></x-frontend.notification>

        <h2 class="product-heading pb-2">{{ $contents->{'page_title_' . $middleware_language} ?? $contents->page_title_en }}</h2>

        @if($products->isNotEmpty())
            <nav class="nav nav-tabs category-tabs" id="myTab" role="tablist">
                <button class="nav-link active }}" id="0-tab" data-bs-toggle="tab" data-bs-target="#products-0-tab"
                    role="tab" aria-controls="0-products-tab" aria-selected="true">
                    {{ $contents->{'page_first_tab_' . $middleware_language} ?? $contents->page_first_tab_en }}
                </button>

                @if($categories->isNotEmpty())
                    @foreach ($categories as $key => $category)
                        <button class="nav-link" id="{{ $category->id }}-tab" data-bs-toggle="tab"
                            data-bs-target="#products-{{ $category->id }}-tab" role="tab"
                            aria-controls="{{ $category->id }}-products-tab" aria-selected="false">{{ $category->name }}
                        </button>
                    @endforeach
                @endif
            </nav>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="products-0-tab" role="tabpanel" aria-labelledby="all-tab">
                    @if($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <div class="heading-text py-3">{{ $category->name }}</div>

                            <div class="row row-horizontal px-0">
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-md-3 mb-4">
                                                <div class="card-custom">
                                                    <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="card-img">
                                                    <div class="product-info">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="category">{{ $category->name }}</span>
                                                            <span class="rating">
                                                                <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                            </span>
                                                        </div>
                                                        <span class="product-name py-2">{{ $product->name }}</span>
                                                        <div class="product-details">
                                                            <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                                        </div>
                                                    </div>

                                                    @if(auth()->check())
                                                        @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name))
                                                            @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                                                <button class="cta-button-disabled" disabled>
                                                                    {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                                </button>
                                                            @else
                                                                <form action="{{ route('frontend.carts.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                    <button type="submit" class="cta-button" data-bs-toggle="modal" data-bs-target="#view-product">
                                                                        <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                        {{ $contents->{'page_add_to_cart_' . $middleware_language} ?? $contents->page_add_to_cart_en }}
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <button class="cta-button-disabled" disabled>
                                                                {{ $contents->{'page_not_available_' . $middleware_language} ?? $contents->page_not_available_en }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}"
                                                            class="cta-button">{{ $contents->{'page_login_for_purchase_' . $middleware_language} ?? $contents->page_login_for_purchase_en }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>

                @if($categories->isNotEmpty())
                    @foreach($categories as $category)
                        <div class="tab-pane fade" id="products-{{ $category->id }}-tab" role="tabpanel"
                            aria-labelledby="{{ $category->id }}-products-tab" tabindex="0">
                            <div class="heading-text py-3">{{ $category->name }}</div>

                            <div class="row row-horizontal px-0">
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-md-3 mb-4">
                                                <div class="card-custom">
                                                    <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="card-img">

                                                    <div class="product-info">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="category">{{ $category->name }}</span>
                                                            <span class="rating">
                                                                <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                            </span>
                                                        </div>
                                                        <span class="product-name py-2">{{ $product->name }}</span>
                                                        <div class="product-details">
                                                            <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                                        </div>
                                                    </div>

                                                    @if(auth()->check())
                                                        @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                                            <button class="cta-button-disabled" disabled>
                                                                {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                            </button>
                                                        @else
                                                            <form action="{{ route('frontend.carts.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                <button type="submit" class="cta-button">
                                                                    <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                        {{ $contents->{'page_add_to_cart_' . $middleware_language} ?? $contents->page_add_to_cart_en }}
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="cta-button">{{ $contents->{'page_login_for_purchase_' . $middleware_language} ?? $contents->page_login_for_purchase_en }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @else
            <p class="no-data">{{ $contents->{'page_no_products_' . $middleware_language} ?? $contents->page_no_products_en }}</p>
        @endif

        <div class="modal fade" id="view-product" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <div class="popup container">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 d-none d-sm-flex flex-column align-items-center">
                            <div class="thumbnails d-flex flex-column gap-1 mb-3">
                                <img src="assets/image 58.png" alt="Product Image 2" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQm', 'blue')">
                                <img src="assets/image 51.png" alt="Product Image 3" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQn', 'dark-blue')">
                                <img src="assets/image 50.png" alt="Product Image 4" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQo', 'white')">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8 d-flex flex-column align-items-center">
                            <img id="mainImage" src="assets/image 50.png" alt="Product Image 1" class="img-fluid product-image mb-3">
                            <div class="thumbnails d-flex d-sm-none flex-row gap-1">
                                <img src="assets/image 58.png" alt="Product Image 2" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQm', 'blue')">
                                <img src="assets/image 51.png" alt="Product Image 3" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQn', 'dark-blue')">
                                <img src="assets/image 50.png" alt="Product Image 4" class="thumbnail" onclick="changeImage('https://dashboard.codeparrot.ai/api/assets/Z4c1efzJ0Q4FLAQo', 'white')">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 product-info">
                            <div class="category-ratings d-flex justify-content-between align-items-center mb-3">
                                <span class="category">Clothing</span>
                                <div class="reviews d-flex align-items-center gap-2">
                                    <span>567 reviews</span>
                                    <img src="/assets/Z4c1f_zJ0Q4FLAQp" alt="rating" class="rating-img">
                                </div>
                            </div>
                            <h1 class="product-title mb-3">ISSN T-shirt (<span id="colorName">White</span>)</h1>
                            <div class="price-colors d-flex justify-content-between align-items-center mb-3">
                                <span class="price">$23</span>
                                <div class="colors d-flex align-items-center gap-2">
                                    <span>Colors available</span>
                                    <div class="color-options d-flex gap-2">
                                        <div class="color white"></div>
                                        <div class="color blue"></div>
                                        <div class="color dark-blue"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="description-section mb-3">
                                <span class="label">Description</span>
                                <p class="description-text">This ISSN T-shirt is a must-have for any fitness enthusiast. Crafted from a lightweight, breathable fabric, it's designed to keep you cool and comfortable during your workouts. The classic white color makes it perfect for any occasion.</p>
                            </div>
                            <div class="size-section mb-2">
                                <div class="size-header d-flex gap-2 align-items-center mb-2">
                                    <span class="label">Size</span>
                                    <div class="size-guide d-flex align-items-center gap-1">
                                        <img src="assets/mdi_ruler.svg" alt="ruler" class="ruler-icon">
                                        <span>Size guide</span>
                                    </div>
                                </div>
                                <div class="size-options d-flex flex-wrap gap-2">
                                    <button class="size-btn btn btn-outline-secondary" onclick="selectSize(this)">XS</button>
                                    <button class="size-btn btn btn-outline-secondary" onclick="selectSize(this)">S</button>
                                    <button class="size-btn btn btn-outline-secondary" onclick="selectSize(this)">M</button>
                                    <button class="size-btn btn btn-outline-secondary" onclick="selectSize(this)">L</button>
                                    <button class="size-btn btn btn-outline-secondary" onclick="selectSize(this)">XL</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <button class="add-to-cart btn btn-outline-primary" onclick="fadeButton(this)">
                                    <img src="assets/fluent_cart-20-regular.svg" alt="cart">
                                    <span>Add to cart</span>
                                </button>
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
        function changeImage(imageUrl, color) {
            document.getElementById('mainImage').src = imageUrl;
            document.getElementById('colorName').textContent = color.charAt(0).toUpperCase() + color.slice(1);
        }

        function selectSize(button) {
            const buttons = document.querySelectorAll('.size-btn');
            buttons.forEach(btn => btn.classList.remove('active', 'clicked'));
            button.classList.add('active', 'clicked');
        }

        function fadeButton(button) {
            button.classList.add('clicked');
        }
    </script>
    @endpush
