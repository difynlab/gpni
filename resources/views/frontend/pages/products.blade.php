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
        <x-frontend.notification-popup></x-frontend.notification-popup>

        <div class="product-heading heading">{{ $contents->{'page_title_' . $middleware_language} ?? $contents->page_title_en }}</div>

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
                            <div class="heading-text sub-heading py-3">{{ $category->name }}</div>

                            <div class="row row-horizontal px-0">
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-md-3 mb-4">
                                                <div class="card-custom" data-bs-toggle="modal" data-bs-target="#all-view-product-{{ $product->id }}">
                                                    <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="card-img">
                                                    <div class="product-info">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="category">{{ $category->name }}</span>
                                                            <span class="rating">
                                                                <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                            </span>
                                                        </div>
                                                        <span class="product-name text-heading">{{ $product->name }}</span>
                                                        <div class="product-details text-content">
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

                                                <div class="modal fade" id="all-view-product-{{ $product->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body pb-5">
                                                            <div class="popup container">
                                                                <div class="row">
                                                                    @if($product->images)
                                                                        <div class="col-lg-2 col-md-3 col-sm-4 d-none d-sm-flex flex-column align-items-center">
                                                                            <div class="thumbnails d-flex flex-column gap-1 mb-3">
                                                                                @foreach(json_decode($product->images) as $image)
                                                                                    <img src="{{ asset('storage/backend/products/products/' . $image) }}" alt="Product Image" class="thumbnail all-product-image" data-id="{{ $product->id }}">
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    <div class="col-lg-4 col-md-6 col-sm-8 d-flex flex-column align-items-center">
                                                                        <img id="all-main-image-{{ $product->id }}" src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="img-fluid product-image mb-3">
                                                                    </div>

                                                                    <div class="col-lg-6 col-md-12 product-info">
                                                                        <div class="category-ratings d-flex justify-content-between align-items-center mb-3">
                                                                            <span class="category">{{ $category->name }}</span>
                                                                        </div>
                                                                        
                                                                        <div class="product-title text-heading mb-3">{{ $product->name }}</div>
                                                                        <div class="price-colors d-flex justify-content-between align-items-center mb-3">
                                                                            <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                                                            @if($product->colors)
                                                                                <div class="colors d-flex align-items-center gap-2">
                                                                                    <div class="color-options d-flex gap-2">
                                                                                        @foreach(json_decode($product->colors) as $color)
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input color-radio" type="radio" name="color" value="{{ $color }}" data-id="{{ $product->id }}">
                                                                                                <label class="form-check-label">
                                                                                                    {{ $color }}
                                                                                                </label>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="description-section mb-3">
                                                                            <div class="text-content">{!! $product->description !!}</div>
                                                                        </div>

                                                                        @if($product->available_sizes)
                                                                            <div class="size-section mb-2">
                                                                                <div class="size-options d-flex flex-wrap gap-2">
                                                                                    @foreach(json_decode($product->available_sizes) as $available_size)
                                                                                        <button class="size-btn btn btn-outline-secondary" type="button" data-value="{{ $available_size }}" data-id="{{ $product->id }}">
                                                                                            {{ $available_size }}
                                                                                        </button>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <div class="d-flex justify-content-start">
                                                                            @if(auth()->check())
                                                                                @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                                                                    <button class="cta-button-disabled" disabled>
                                                                                        {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                                                    </button>
                                                                                @else
                                                                                    <form action="{{ route('frontend.carts.store') }}" method="POST" id="product-form">
                                                                                        @csrf
                                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                                        <input type="hidden" name="color" id="color-{{ $product->id }}">

                                                                                        <input type="hidden" name="size" id="size-{{ $product->id }}">

                                                                                        <button type="submit" class="cta-button" id="cta-button">
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
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                            <div class="heading-text heading py-3">{{ $category->name }}</div>

                            <div class="row row-horizontal px-0">
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-md-3 mb-4">
                                                <div class="card-custom" data-bs-toggle="modal" data-bs-target="#category-view-product-{{ $product->id }}">
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

                                                <div class="modal fade" id="category-view-product-{{ $product->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="popup container">
                                                                <div class="row">
                                                                    @if($product->images)
                                                                        <div class="col-lg-2 col-md-3 col-sm-4 d-none d-sm-flex flex-column align-items-center">
                                                                            <div class="thumbnails d-flex flex-column gap-1 mb-3">
                                                                                @foreach(json_decode($product->images) as $image)
                                                                                    <img src="{{ asset('storage/backend/products/products/' . $image) }}" alt="Product Image" class="thumbnail category-product-image" data-id="{{ $product->id }}">
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    <div class="col-lg-4 col-md-6 col-sm-8 d-flex flex-column align-items-center">
                                                                        <img id="category-main-image-{{ $product->id }}" src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="img-fluid product-image mb-3">
                                                                    </div>

                                                                    <div class="col-lg-6 col-md-12 product-info">
                                                                        <div class="category-ratings d-flex justify-content-between align-items-center mb-3">
                                                                            <span class="category">{{ $category->name }}</span>
                                                                        </div>
                                                                        
                                                                        <div class="product-title heading mb-3">{{ $product->name }}</div>
                                                                        <div class="price-colors d-flex justify-content-between align-items-center mb-3">
                                                                            <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                                                            @if($product->colors)
                                                                                <div class="colors d-flex align-items-center gap-2">
                                                                                    <div class="color-options d-flex gap-2">
                                                                                        @foreach(json_decode($product->colors) as $color)
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input category-color-radio" type="radio" name="color" value="{{ $color }}" data-id="{{ $product->id }}">
                                                                                                <label class="form-check-label">
                                                                                                    {{ $color }}
                                                                                                </label>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="description-section mb-3">
                                                                            <div class="description-text">{!! $product->description !!}</div>
                                                                        </div>

                                                                        @if($product->available_sizes)
                                                                            <div class="size-section mb-2">
                                                                                <div class="size-options d-flex flex-wrap gap-2">
                                                                                    @foreach(json_decode($product->available_sizes) as $available_size)
                                                                                        <button class="category-size-btn btn btn-outline-secondary" type="button" data-value="{{ $available_size }}" data-id="{{ $product->id }}">
                                                                                            {{ $available_size }}
                                                                                        </button>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <div class="d-flex justify-content-start">
                                                                            @if(auth()->check())
                                                                                @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                                                                    <button class="cta-button-disabled" disabled>
                                                                                        {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                                                    </button>
                                                                                @else
                                                                                    <form action="{{ route('frontend.carts.store') }}" method="POST" id="product-form">
                                                                                        @csrf
                                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                                        <input type="hidden" name="color" id="category-color-{{ $product->id }}">

                                                                                        <input type="hidden" name="size" id="category-size-{{ $product->id }}">

                                                                                        <button type="submit" class="cta-button" id="cta-button">
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
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
            <div class="no-data">{{ $contents->{'page_no_products_' . $middleware_language} ?? $contents->page_no_products_en }}</div>
        @endif
    </div>

@endsection

@push('after-scripts')
    <script>
        $('.all-product-image').on('click', function() {
            let image = $(this).attr('src');
            let id = $(this).attr('data-id');

            $('#all-main-image-' + id).attr('src', image);
        });

        $('.category-product-image').on('click', function() {
            let image = $(this).attr('src');
            let id = $(this).attr('data-id');

            $('#category-main-image-' + id).attr('src', image);
        });

        $('.size-btn').on('click', function() {
            let size = $(this).attr('data-value');
            let id = $(this).attr('data-id');

            $('#size-' + id).val(size);
            $('.size-btn').removeClass('active');
            $(this).addClass('active');
        })

        $('.color-radio').on('change', function () {
            let color = $(this).val();
            let id = $(this).attr('data-id');

            $('#color-' + id).val(color);
        });

        $('.category-size-btn').on('click', function() {
            let size = $(this).attr('data-value');
            let id = $(this).attr('data-id');

            $('#category-size-' + id).val(size);
            $('.category-size-btn').removeClass('active');
            $(this).addClass('active');
        })

        $('.category-color-radio').on('change', function () {
            let color = $(this).val();
            let id = $(this).attr('data-id');

            $('#category-color-' + id).val(color);
        });
    </script>
@endpush