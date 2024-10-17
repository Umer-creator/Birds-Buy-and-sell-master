<div class="container for-you mt-9">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Featured Products</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <a href="{{ url('products') }}" class="title-link">All Products <i class="icon-long-arrow-right"></i></a>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->
    {{-- <!-- Start product -->  --}}
    <div class="products">
        <div class="row justify-content-center">

            @foreach ($featured_products as $featured_product)
                <div class="col-5 col-md-5 col-lg-3 ">
                    <div class="product product-2 shadow m-3">
                        <figure class="product-media">
                            <span class="product-label label-circle label-sale">sale</span>
                            <a href="">
                                <img src=" {{ asset($featured_product->image) }}" alt="Product image"
                                    style="height:220px;" class="product-image image-fluid">
                            </a>
                            <div class="product-action-vertical">
                                <a href="" class="btn-product-icon  btn-wishlist btn-expandable"><span>add
                                        to
                                        wishlist</span></a>


                                {{-- <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" --}}
                                <a href="{{ route('frontend.view-product-detail', ['slug' => $featured_product->slug]) }}"
                                    class="btn-product-icon  btn-expandable">
                                    <i class="icon-info-circle"></i>
                                    <span>View</span></a>

                            </div><!-- End .product-action-vertical -->



                            @if ($featured_product->quantity >= 1)
                                <div class="product-action">
                                    <livewire:product.add-cart-component :productId="$featured_product->id"
                                        :wire:key="$featured_product->id" />
                                </div><!-- End .product-action -->
                            @else
                                <div class="product-action">
                                    <span class="btn-product btn-cart btn disabled">
                                        <span>Out of stock</span>
                                    </span>
                                </div><!-- End .product-action -->
                            @endif


                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a
                                    href="{{ route('frontend.view-category', ['slug' => $featured_product->category->slug]) }}">{{ $featured_product->category->name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a
                                    href="{{ route('frontend.view-product-detail', ['slug' => $featured_product->slug]) }}">{{ $featured_product->name }}</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">

                                <span class="new-price">Rs: {{ $featured_product->price }}</span>
                                {{-- <span class="old-price">Was $349.99</span> --}}
                            </div><!-- End .product-price -->
                            <div class="rating-container">
                                @php
                                    $reviews = $featured_product->review;
                                    $averageRating = $reviews->avg('rating');
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>
                                        @if ($i <= $averageRating)
                                            <i class="fas fa-star fa-stack-1x" style="color: #FFC107;"></i>
                                        @endif
                                    </span>
                                @endfor

                            </div>

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
            @endforeach
        </div><!-- End .row -->
    </div>
    {{-- <!-- end product -->  --}}
</div>
