@extends('frontend.layouts.app')

@section('title', 'Products')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/products.css') }}">
@endpush

@section('content')

<div class="container mt-5">

        <ul class="nav nav-tabs category-tabs" id="myTab" role="tablist">
            @foreach($categories as $key => $category)
            <li class="nav-item">
                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ strtolower($category->name) }}-tab" data-toggle="tab" href="#{{ strtolower($category->name) }}" role="tab" aria-controls="{{ strtolower($category->name) }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="heading-text py-3">
                    Books
                </div>

              <!-- Books Contents -->
                <div class="row row-horizontal px-0">
                    @foreach($product_books as $product_book)
                        <!-- Card 1 -->
                        <div class="col-md-3">
                            <div class="card-custom">
                                <img src="{{ asset('storage/' . $product_book ->thumbnail) }}" alt="Product Image" class="card-img">
                                <div class="product-info">
                                    <div class="d-flex justify-content-between">
                                        <span class="category">{{ $product_book ->name }}</span>
                                        <span class="rating">
                                            <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating">
                                        </span>
                                    </div>
                                    <span class="product-name py-2">{{ $product_book ->description }}</span>
                                    <div class="product-details">
                                        <span class="price">${{ $product_book ->price }}</span>
                                    </div>
                                </div>

                                <a href="#" class="cta-button">
                                    <img src="{{ asset('storage/frontend/products/fluent-cart-20-regular-2.svg') }}" alt="Cart Icon">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="heading-text py-3">
                    Clothing
                </div>

                <!-- Clothing Contents -->
                <div class="row row-horizontal px-2">
                    @foreach($product_cloths as $product_cloth)
                        <!-- Card 1 -->
                        <div class="col-md-3">
                            <div class="card-custom">
                                <img src="{{ asset('storage/' . $product_book ->thumbnail) }}" alt="Product Image" class="card-img">
                                <div class="product-info">
                                    <div class="d-flex justify-content-between">
                                        <span class="category">{{ $product_cloth ->name }}</span>
                                        <span class="rating">
                                            <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating">
                                        </span>
                                    </div>
                                    <span class="product-name py-2">{{ $product_cloth ->description }}</span>
                                    <div class="product-details">
                                        <span class="price">${{ $product_cloth ->price }}</span>
                                    </div>
                                </div>

                                <a href="#" class="cta-button">
                                    <img src="{{ asset('storage/frontend/products/fluent-cart-20-regular-2.svg') }}" alt="Cart Icon">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="heading-text py-3">
                    Courses
                </div>

                <!-- Courses Contents -->
                <div class="row row-horizontal px-2">
                    @foreach($product_courses as $product_course)
                        <!-- Card 1 -->
                        <div class="col-md-3">
                            <div class="card-custom">
                                <img src="{{ asset('storage/' . $product_book ->thumbnail) }}" alt="Product Image" class="card-img">
                                <div class="product-info">
                                    <div class="d-flex justify-content-between">
                                        <span class="category">{{ $product_course ->name }}</span>
                                        <span class="rating">
                                            <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating">
                                        </span>
                                    </div>
                                    <span class="product-name py-2">{{ $product_course ->description }}</span>
                                    <div class="product-details">
                                        <span class="price">${{ $product_course ->price }}</span>
                                    </div>
                                </div>

                                <a href="#" class="cta-button">
                                    <img src="{{ asset('storage/frontend/products/fluent-cart-20-regular-2.svg') }}" alt="Cart Icon">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="heading-text py-3">
                    Merchandise
                </div>

                <!-- Merchandise Contents -->
                <div class="row row-horizontal px-2">
                    @foreach($product_courses as $product_course)
                        <!-- Card 1 -->
                        <div class="col-md-3">
                            <div class="card-custom">
                                <img src="{{ asset('storage/' . $product_book ->thumbnail) }}" alt="Product Image" class="card-img">
                                <div class="product-info">
                                    <div class="d-flex justify-content-between">
                                        <span class="category">{{ $product_course ->name }}</span>
                                        <span class="rating">
                                            <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating">
                                        </span>
                                    </div>
                                    <span class="product-name py-2">{{ $product_course ->description }}</span>
                                    <div class="product-details">
                                        <span class="price">${{ $product_course ->price }}</span>
                                    </div>
                                </div>

                                <a href="#" class="cta-button">
                                    <img src="{{ asset('storage/frontend/products/fluent-cart-20-regular-2.svg') }}" alt="Cart Icon">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Content for All goes here -->
            </div>

            <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                <div class="row row-horizontal">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-54.svg" alt="Product Image 1" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Books</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name py-2">PNE Level-1 Merchandise & Course Materials</span>
                                <div class="product-details">
                                    <span class="price">$229</span>
                                </div>
                            </div>

                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="clothing" role="tabpanel" aria-labelledby="clothing-tab">
                <div class="row row-horizontal">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-49.svg" alt="Product Image 1" class="card-img pt-5">
                            <div class="product-info">
                                <div class="d-flex justify-content-between py-2">
                                    <span class="category">Clothing</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">GPNi & ISSN Polo - (White)</span>
                                <div class="product-details  d-flex justify-content-between align-items-center">
                                    <span class="price pt-1">$29</span>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <div class="row row-horizontal">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card-custom position-relative">
                            <img src="storage/frontend/products/image-56.svg" alt="GPNi Yearly Membership" class="card-img">
                            <div class="courses-membership-offer">Membership Offer!</div>
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Course</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">GPNi Yearly Membership</span>
                                <div class="offer-price d-flex align-items-center">
                                    <span class="strike-price">$199</span>
                                    <span class="price">$99</span>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="merchandise" role="tabpanel" aria-labelledby="merchandise-tab">
                <div class="row row-horizontal">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color4" id="color-white-4" class="color-radio" checked>
                            <input type="radio" name="color4" id="color-blue-4" class="color-radio">
                            <input type="radio" name="color4" id="color-2-colors-4" class="color-radio">

                            <!-- Product images -->
                            <img src="storage/frontend/gpni white pen.svg" alt="GPNi Pen White" class="card-img"
                                id="image-white-4">
                            <img src="storage/frontend/gpni blue pen.svg" alt="GPNi Pen Blue" class="card-img" id="image-blue-4">
                            <img src="storage/frontend/gpni blue + white.svg" alt="GPNi Pen 2 Colors" class="card-img"
                                id="image-2-colors-4">

                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <!-- Product names -->
                                <span class="product-name" id="product-name-white-4">GPNi Pen (White)</span>
                                <span class="product-name" id="product-name-blue-4">GPNi Pen (Blue)</span>
                                <span class="product-name" id="product-name-2-colors-4">GPNi Pen (Blue + White)</span>
                                <div class="product-details d-flex justify-content-between align-items-center">
                                    <!-- Prices -->
                                    <span class="price" id="price-white-4">$19.95</span>
                                    <span class="price" id="price-blue-4">$10.95</span>
                                    <span class="price" id="price-2-colors-4">$10.95</span>
                                    <div class="color-options">
                                        <label for="color-white-4">
                                            <img src="storage/frontend/products/white.svg" alt="Color White">
                                        </label>
                                        <label for="color-blue-4">
                                            <img src="storage/frontend/products/blue.svg" alt="Color Blue">
                                        </label>
                                        <label for="color-2-colors-4">
                                            <img src="storage/frontend/products/2-colors.svg" alt="Color 2 Colors">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular.svg" alt="Cart Icon">
                                Add to cart
                            </a>

                            <!-- Navigation Arrows -->
                            <label for="color-blue-4" class="nav-arrow left-arrow">&#10094;</label>
                            <label for="color-2-colors-4" class="nav-arrow right-arrow">&#10095;</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML structure -->
    <div class="add-to-cart-modal">
        <!-- Modal Structure -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-container">
                                    <div class="product-gallery">
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145.svg" alt="White T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145-2.svg" alt="Blue T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145-3.svg" alt="Dark Blue T-shirt">
                                        </div>
                                    </div>
                                    <div class="product-main">
                                        <img src="storage/frontend/frame-1171276145-4.svg" alt="Main T-shirt">
                                        <div class="product-caption">
                                            ISSN T-shirt (White)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="category">Clothing</span>
                                        <div class="d-flex align-items-center">
                                            <span class="reviews">567 reviews</span>
                                            <img src="storage/frontend/rating.svg" alt="Rating" class="ml-2">
                                        </div>
                                    </div>

                                    <h1 class="title">ISSN T-shirt (White)</h1>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">$23</span>
                                        <div class="colors-available">
                                            <span>Colors available</span>
                                            <div class="color-option"><img src="storage/frontend/white.svg" alt="White"></div>
                                            <div class="color-option"><img src="storage/frontend/blue.svg" alt="Blue"></div>
                                            <div class="color-option"><img src="storage/frontend/dark-blue.svg" alt="Dark Blue">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="description">This ISSN T-shirt is a must-have for any fitness enthusiast.
                                        Crafted from a lightweight, breathable fabric, it's designed to keep you cool
                                        and
                                        comfortable during your workouts. The classic white color makes it perfect for
                                        any
                                        occasion.</p>

                                    <div>
                                        <a href="#" class="size-guide d-flex align-items-center">
                                            <img src="storage/frontend/mdi-ruler.svg" alt="Size guide">
                                            Size guide
                                        </a>
                                    </div>

                                    <div class="sizes">
                                        <div class="size-option selected"><span>XS</span></div>
                                        <div class="size-option"><span>S</span></div>
                                        <div class="size-option"><span>M</span></div>
                                        <div class="size-option"><span>L</span></div>
                                        <div class="size-option"><span>XL</span></div>
                                    </div>

                                    <div class="cta-button mt-4 w-50">
                                        <img src="storage/frontend/fluent-cart-20-regular.svg" alt="Cart Icon">
                                        Add to cart
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