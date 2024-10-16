@extends('frontend.layouts.app')

@section('title', 'Products')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/products.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    
    <div class="container mt-5">
        <ul class="nav nav-tabs category-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all"
                    aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="books-tab" data-toggle="tab" href="#books" role="tab" aria-controls="books"
                    aria-selected="false">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="clothing-tab" data-toggle="tab" href="#clothing" role="tab"
                    aria-controls="clothing" aria-selected="false">Clothing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab"
                    aria-controls="courses" aria-selected="false">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="merchandise-tab" data-toggle="tab" href="#merchandise" role="tab"
                    aria-controls="merchandise" aria-selected="false">Merchandise</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="heading-text py-3">
                    Books
                </div>

                <!-- Books Contents -->
                <div class="row row-horizontal px-0">
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-55.svg" alt="Product Image 2" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Books</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name py-2">PNE Level-2 Masters Merchandise & Course
                                    Materials</span>
                                <div class="product-details">
                                    <span class="price">$298</span>
                                </div>
                            </div>

                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>

                <div class="heading-text py-3">
                    Clothing
                </div>

                <!-- Clothing Contents -->
                <div class="row row-horizontal px-2">
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color" id="color-white" class="color-radio" checked>
                            <input type="radio" name="color" id="color-blue" class="color-radio">
                            <input type="radio" name="color" id="color-dark-blue" class="color-radio">

                            <!-- Membership Offer -->
                            <div class="membership-offer-container">
                                <div class="membership-offer d-flex align-items-end justify-content-end">Membership
                                    Offer!</div>
                            </div>

                            <!-- Product images -->
                            <img src="storage/frontend/products/frame-1171276145.svg" alt="Product Image White" class="card-img pt-5"
                                id="image-white">
                            <img src="/assets/Klein blue.png" alt="Product Image Blue" class="card-img pt-4"
                                id="image-blue">
                            <img src="/assets/blue shirt.png" alt="Product Image Dark Blue" class="card-img pt-5"
                                id="image-dark-blue">

                            <div class="product-info">
                                <div class="d-flex justify-content-between py-2">
                                    <span class="category">Clothing</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name" id="product-name">ISSN T-shirt (White)</span>
                                <div class="product-details d-flex justify-content-between align-items-center">
                                    <!-- Price container -->
                                    <div class="clothing-price pt-1"></div>

                                    <!-- Color options -->
                                    <div class="color-options">
                                        <label for="color-white" class="color-label" id="label-white">
                                            <svg width="20" height="20">
                                                <circle cx="10" cy="10" r="8" fill="#FFF" stroke-width="0.5"
                                                    stroke="#000"></circle>
                                            </svg>
                                        </label>
                                        <label for="color-blue" id="label-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <circle cx="8" cy="8" r="8" fill="#0040C3" />
                                            </svg>
                                        </label>
                                        <label for="color-dark-blue" id="label-dark-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <circle cx="8" cy="8" r="8" fill="#000088" />
                                            </svg>
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="cta-button" data-toggle="modal" data-target="#productModal">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>

                            <!-- Navigation Arrows -->
                            <label for="color-dark-blue" class="nav-arrow left-arrow">&#10094;</label>
                            <label for="color-blue" class="nav-arrow right-arrow">&#10095;</label>
                        </div>
                    </div>




                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color3" id="color-blue-3" class="color-radio" checked>
                            <input type="radio" name="color3" id="color-dark-blue-3" class="color-radio">

                            <!-- Membership Offer -->
                            <div class="membership-offer-container">
                                <div class="membership-offer d-flex align-items-end justify-content-end">Membership
                                    Offer!</div>
                            </div>

                            <!-- Product images -->
                            <img src="/assets/gpni klein blue.svg" alt="Product Image Blue" class="card-img pt-4"
                                id="image-blue-3">
                            <img src="/assets/gpni blue.svg" alt="Product Image Dark Blue" class="card-img pt-5"
                                id="image-dark-blue-3">

                            <div class="product-info">
                                <div class="d-flex justify-content-between py-2">
                                    <span class="category">Clothing</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <!-- Product names -->
                                <span class="product-name" id="product-name-blue-3">GPNi Tshirt (Blue)</span>
                                <span class="product-name" id="product-name-dark-blue-3">GPNi Tshirt (Klein Blue)</span>
                                <div class="product-details d-flex justify-content-between align-items-center">
                                    <div class="offer-price d-flex align-items-center">
                                        <!-- Prices -->
                                        <span class="strike-price" id="strike-price-blue-3">$23</span>
                                        <span class="price" id="price-blue-3">$19.95</span>
                                        <span class="price" id="price-dark-blue-3">$23</span>
                                    </div>
                                    <div class="color-options">
                                        <label for="color-blue-3">
                                            <img src="storage/frontend/products/blue-2.svg" alt="Color Blue">
                                        </label>
                                        <label for="color-dark-blue-3">
                                            <img src="storage/frontend/products/dark-blue-2.svg" alt="Color Dark Blue">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>

                            <!-- Navigation Arrows -->
                            <label for="color-dark-blue-3" class="nav-arrow left-arrow">&#10094;</label>
                            <label for="color-blue-3" class="nav-arrow right-arrow">&#10095;</label>
                        </div>
                    </div>

                </div>

                <div class="heading-text py-3">
                    Courses
                </div>

                <!-- Courses Contents -->
                <div class="row row-horizontal px-2">
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-59.svg" alt="PNE Level-1+ SNS Payment Plan" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Course</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">PNE Level-1 + SNS Payment Plan (2nd 50%)</span>
                                <div>
                                    <span class="price">$529</span>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-60.svg" alt="GPNi Lifetime Membership" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Course</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">GPNi Lifetime Membership</span>
                                <div>
                                    <span class="price">$249</span>
                                </div>
                            </div>

                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>

                <div class="heading-text py-3">
                    Merchandise
                </div>

                <!-- Merchandise Contents -->
                <div class="row row-horizontal px-2">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color4" id="color-white-4" class="color-radio" checked>
                            <input type="radio" name="color4" id="color-blue-4" class="color-radio">
                            <input type="radio" name="color4" id="color-2-colors-4" class="color-radio">

                            <!-- Product images -->
                            <img src="/assets/gpni white pen.svg" alt="GPNi Pen White" class="card-img"
                                id="image-white-4">
                            <img src="/assets/gpni blue pen.svg" alt="GPNi Pen Blue" class="card-img" id="image-blue-4">
                            <img src="/assets/gpni blue + white.svg" alt="GPNi Pen 2 Colors" class="card-img"
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-45.svg" alt="Phone Cover" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Phone Cover</span>
                                <span class="price">$29</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-48.svg" alt="Stainless Steel Shaker" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Stainless Steel Shaker</span>
                                <span class="price">$24.9</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-3.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-53.svg" alt="Logistics Fee" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Logistics Fee Hard Copy Certifications</span>
                                <span class="price">$40</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-4.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-55.svg" alt="Product Image 2" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Books</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name py-2">PNE Level-2 Masters Merchandise & Course
                                    Materials</span>
                                <div class="product-details">
                                    <span class="price">$298</span>
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color" id="color-white" class="color-radio" checked>
                            <input type="radio" name="color" id="color-blue" class="color-radio">
                            <input type="radio" name="color" id="color-dark-blue" class="color-radio">

                            <!-- Membership Offer -->
                            <div class="membership-offer-container">
                                <div class="membership-offer d-flex align-items-end justify-content-end">Membership
                                    Offer!</div>
                            </div>

                            <!-- Product images -->
                            <img src="storage/frontend/products/frame-1171276145.svg" alt="Product Image White" class="card-img pt-5"
                                id="image-white">
                            <img src="/assets/Klein blue.png" alt="Product Image Blue" class="card-img pt-4"
                                id="image-blue">
                            <img src="/assets/blue shirt.png" alt="Product Image Dark Blue" class="card-img pt-5"
                                id="image-dark-blue">

                            <div class="product-info">
                                <div class="d-flex justify-content-between py-2">
                                    <span class="category">Clothing</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name" id="product-name">ISSN T-shirt (White)</span>
                                <div class="product-details d-flex justify-content-between align-items-center">
                                    <!-- Price container -->
                                    <div class="clothing-price pt-1"></div>

                                    <!-- Color options -->
                                    <div class="color-options">
                                        <label for="color-white" class="color-label" id="label-white">
                                            <svg width="20" height="20">
                                                <circle cx="10" cy="10" r="8" fill="#FFF" stroke-width="0.5"
                                                    stroke="#000"></circle>
                                            </svg>
                                        </label>
                                        <label for="color-blue" id="label-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <circle cx="8" cy="8" r="8" fill="#0040C3" />
                                            </svg>
                                        </label>
                                        <label for="color-dark-blue" id="label-dark-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <rect x="0.75" y="0.75" width="16.5" height="16.5" rx="8.25"
                                                    stroke="black" stroke-width="0.5" />
                                                <path
                                                    d="M14.6569 3.34314C13.914 2.60028 13.0321 2.011 12.0615 1.60896C11.0909 1.20693 10.0506 1 9 1C7.94942 1 6.90914 1.20693 5.93853 1.60896C4.96793 2.011 4.08601 2.60028 3.34314 3.34315C2.60028 4.08602 2.011 4.96793 1.60896 5.93853C1.20693 6.90914 1 7.94943 1 9C1 10.0506 1.20693 11.0909 1.60896 12.0615C2.011 13.0321 2.60028 13.914 3.34315 14.6569L9 9L14.6569 3.34314Z"
                                                    fill="#0040C3" />
                                                <path
                                                    d="M3.34315 14.6569C4.08602 15.3997 4.96793 15.989 5.93853 16.391C6.90914 16.7931 7.94943 17 9 17C10.0506 17 11.0909 16.7931 12.0615 16.391C13.0321 15.989 13.914 15.3997 14.6569 14.6569C15.3997 13.914 15.989 13.0321 16.391 12.0615C16.7931 11.0909 17 10.0506 17 9C17 7.94942 16.7931 6.90914 16.391 5.93853C15.989 4.96793 15.3997 4.08601 14.6569 3.34314L9 9L3.34315 14.6569Z"
                                                    fill="white" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>

                            <!-- Navigation Arrows -->
                            <label for="color-dark-blue" class="nav-arrow left-arrow">&#10094;</label>
                            <label for="color-blue" class="nav-arrow right-arrow">&#10095;</label>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="hover-card-custom card-custom position-relative">
                            <!-- Radio buttons for color selection -->
                            <input type="radio" name="color3" id="color-blue-3" class="color-radio" checked>
                            <input type="radio" name="color3" id="color-dark-blue-3" class="color-radio">

                            <!-- Membership Offer -->
                            <div class="membership-offer-container">
                                <div class="membership-offer d-flex align-items-end justify-content-end">Membership
                                    Offer!</div>
                            </div>

                            <!-- Product images -->
                            <img src="/assets/gpni klein blue.svg" alt="Product Image Blue" class="card-img pt-4"
                                id="image-blue-3">
                            <img src="/assets/gpni blue.svg" alt="Product Image Dark Blue" class="card-img pt-5"
                                id="image-dark-blue-3">

                            <div class="product-info">
                                <div class="d-flex justify-content-between py-2">
                                    <span class="category">Clothing</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <!-- Product names -->
                                <span class="product-name" id="product-name-blue-3">GPNi Tshirt (Blue)</span>
                                <span class="product-name" id="product-name-dark-blue-3">GPNi Tshirt (Klein Blue)</span>
                                <div class="product-details d-flex justify-content-between align-items-center">
                                    <div class="offer-price d-flex align-items-center">
                                        <!-- Prices -->
                                        <span class="strike-price" id="strike-price-blue-3">$23</span>
                                        <span class="price" id="price-blue-3">$19.95</span>
                                        <span class="price" id="price-dark-blue-3">$23</span>
                                    </div>
                                    <div class="color-options">
                                        <label for="color-blue-3">
                                            <img src="storage/frontend/products/blue-2.svg" alt="Color Blue">
                                        </label>
                                        <label for="color-dark-blue-3">
                                            <img src="storage/frontend/products/dark-blue-2.svg" alt="Color Dark Blue">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>

                            <!-- Navigation Arrows -->
                            <label for="color-dark-blue-3" class="nav-arrow left-arrow">&#10094;</label>
                            <label for="color-blue-3" class="nav-arrow right-arrow">&#10095;</label>
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-59.svg" alt="PNE Level-1+ SNS Payment Plan" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Course</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">PNE Level-1 + SNS Payment Plan (2nd 50%)</span>
                                <div>
                                    <span class="price">$529</span>
                                </div>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-60.svg" alt="GPNi Lifetime Membership" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Course</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">GPNi Lifetime Membership</span>
                                <div>
                                    <span class="price">$249</span>
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
                            <img src="/assets/gpni white pen.svg" alt="GPNi Pen White" class="card-img"
                                id="image-white-4">
                            <img src="/assets/gpni blue pen.svg" alt="GPNi Pen Blue" class="card-img" id="image-blue-4">
                            <img src="/assets/gpni blue + white.svg" alt="GPNi Pen 2 Colors" class="card-img"
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

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-45.svg" alt="Phone Cover" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Phone Cover</span>
                                <span class="price">$29</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-2.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-48.svg" alt="Stainless Steel Shaker" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Stainless Steel Shaker</span>
                                <span class="price">$24.9</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-3.svg" alt="Cart Icon">
                                Add to cart
                            </a>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card-custom">
                            <img src="storage/frontend/products/image-53.svg" alt="Logistics Fee" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category">Merchandise</span>
                                    <span class="rating">
                                        <img src="storage/frontend/products/rating.svg" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name">Logistics Fee Hard Copy Certifications</span>
                                <span class="price">$40</span>
                            </div>
                            <a href="#" class="cta-button">
                                <img src="storage/frontend/products/fluent-cart-20-regular-4.svg" alt="Cart Icon">
                                Add to cart
                            </a>
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
                                            <img src="/assets/frame-1171276145.svg" alt="White T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="/assets/frame-1171276145-2.svg" alt="Blue T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="/assets/frame-1171276145-3.svg" alt="Dark Blue T-shirt">
                                        </div>
                                    </div>
                                    <div class="product-main">
                                        <img src="/assets/frame-1171276145-4.svg" alt="Main T-shirt">
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
                                            <img src="/assets/rating.svg" alt="Rating" class="ml-2">
                                        </div>
                                    </div>

                                    <h1 class="title">ISSN T-shirt (White)</h1>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">$23</span>
                                        <div class="colors-available">
                                            <span>Colors available</span>
                                            <div class="color-option"><img src="/assets/white.svg" alt="White"></div>
                                            <div class="color-option"><img src="/assets/blue.svg" alt="Blue"></div>
                                            <div class="color-option"><img src="/assets/dark-blue.svg" alt="Dark Blue">
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
                                            <img src="/assets/mdi-ruler.svg" alt="Size guide">
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
                                        <img src="/assets/fluent-cart-20-regular.svg" alt="Cart Icon">
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


    </div>

@endsection