<div class="page-content">
    <div class="container">

        @foreach ($product_data as $product)
            @if ($product->status)
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-4">

                            {{-- corousol --}}
                            <section>
                                <div class="owl-carousel owl-simple" data-toggle="owl"
                                    data-owl-options='{
                                    "nav": true, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":1
                                        },    
                                    }
                                }'>

                                    @php
                                        $images = json_decode($product->images, true);
                                    @endphp

                                    @foreach ($images as $image)
                                        <div class="banner banner-cat">
                                            <a>
                                                <img src="{{ asset($image) }}" alt="Banner">
                                            </a>
                                        </div><!-- End .banner -->
                                    @endforeach
                                </div><!-- End .banners-carousel owl-carousel owl-simple -->
                            </section>
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <section>

                                <div class="product-details ml-5 product_data">
                                    <h1 class="product-title"> {{ $product->name }} </h1>

                                    <!-- End .product-title -->

                                    <div class="rating-container">

                                        @php
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

                                    <div class="product-price">
                                        {{ $product->price }}
                                    </div><!-- End .product-price -->
                                    {{-- product id --}}
                                    <input type="hidden" value="20" class="product_id">

                                    <div class="product-content">
                                        <p> {{ $product->short_des }}</p>
                                    </div><!-- End .product-content -->

                                    <div class="product-details-action">

                                        {{-- <button class="btn-product btn-cart addToCartBtn"><span style="color:black">add to
                                                cart</span></button> --}}

                                        @if ($product->quantity >= 1)
                                            <livewire:product.add-cart-component :productId="$product->id"
                                                :wire:key="$product->id" />
                                        @else
                                            <button disabled class="btn-product btn-cart btn-primary "><span
                                                    style="color:rgb(255, 1, 1)">
                                                    out of stock </span></button>
                                        @endif

                                    </div><!-- End .product-details-action -->


                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <div>
                                                <span>Category:</span>
                                                <a
                                                    href="{{ route('frontend.view-category', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                            </div>
                                            <div>
                                                <span>Store:</span>
                                                <a
                                                    href="{{ route('frontend.storeDetail', ['slug' => $product->store->slug]) }}">{{ $product->store->name }}</a>
                                            </div>

                                        </div><!-- End .product-cat -->


                                        <div class="social-icons social-icons-sm">
                                            <livewire:product.add-wishlist-component :productId="$product->id"
                                                :wire:key="$product->id" />
                                        </div>
                                    </div><!-- End .product-details-footer -->


                                </div><!-- End .product-details -->
                            </section>
                        </div><!-- End .col-md-6 -->


                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                {{-- Start tabs --}}

                <section>
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                    role="tab" aria-controls="product-info-tab" aria-selected="false">Additional
                                    information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                    href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                    aria-selected="false">Shipping &
                                    Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab"
                                    href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                    aria-selected="false">Reviews
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            {{-- <!-- Start Product information --> --}}
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    {{-- {{ $product->description }} --}}
                                    <?= $product->description ?>
                                </div><!-- End .product-desc-content -->
                            </div>
                            {{-- <!-- End Product information --> --}}

                            {{-- <!-- Start Addational  information --> --}}
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                                aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    <h4>Store</h4>
                                    <p>{{ $product->store->name }}</p>


                                </div><!-- End .product-desc-content -->
                            </div>
                            {{-- <!-- End Addattional information --> --}}

                            {{-- <!-- Start Shipping and return --> --}}
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum,
                                        facilis quidem autem modi dolore commodi id fugiat ea! Nam eveniet ullam
                                        ex necessitatibus minus voluptatibus assumenda, nostrum fugit inventore.</a><br>
                                        facilis quidem autem modi dolore commodi id fugiat ea! Nam eveniet ullam
                                        ex necessitatibus minus voluptatibus assumenda, nostrum f
                                        <a href="#">Returns information</a>
                                    </p>
                                </div><!-- End .product-desc-content -->
                            </div>
                            {{-- <!-- End Shipping and returnn --> --}}

                            {{-- <!-- Start Reviews --> --}}
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                aria-labelledby="product-review-link">
                                <livewire:product.product-reviews :productId="$product->id" />

                            </div>

                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                </section>
                {{-- End tabs --}}.
                {{-- <!-- End Reviews --> --}}
            @endif
        @endforeach
    </div><!-- End .container -->
</div><!-- End .page-content -->
