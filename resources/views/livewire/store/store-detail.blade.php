  <div class="col-lg-12 mt-2 p-5">
      <div class="toolbox">
          <div class="products ">
              @if ($products->where('status', 1)->count())
                  @foreach ($products as $product)
                      @if ($product->status)
                          <div class="product product-list  shadow-sm p-5 rounded-lg">
                              <div class="row">
                                  <div class="col-6 col-lg-3">
                                      <figure class="product-media">

                                          <a href="product.html">
                                              <img class="rounded-lg" style="height:200px;" {{-- src="{{ asset('uploads/product/1676066658.jpg') }}" alt="Product image" --}}
                                                  src="{{ asset($product->image) }}" alt="Product image"
                                                  class="product-image image-fluid">
                                          </a>
                                      </figure><!-- End .product-media -->
                                  </div><!-- End .col-sm-6 col-lg-3 -->

                                  <div class="col-6 col-lg-3 order-lg-last">
                                      <div class="product-list-action">
                                          <div class="product-price">
                                              Rs: {{ $product->price }}
                                          </div><!-- End .product-price -->
                                          <div class="rating-container">
                                              @php
                                                  $reviews = $product->review;
                                                  $averageRating = $reviews->avg('rating');
                                                  $total_review = $reviews->count();
                                              @endphp
                                              @for ($i = 1; $i <= 5; $i++)
                                                  <span class="fa-stack" style="width:1em">
                                                      <i class="far fa-star fa-stack-1x"></i>
                                                      @if ($i <= $averageRating)
                                                          <i class="fas fa-star fa-stack-1x"
                                                              style="color: #FFC107;"></i>
                                                      @endif
                                                  </span>
                                              @endfor
                                              <span class="ratings-text">( {{ $total_review }} Reviews )</span>

                                          </div>



                                          <div class="product-action mt-2">
                                              <a href="#" class="btn-product " title=""><span>Quantity
                                                  </span></a>
                                              <a href="#" class="btn-product "
                                                  title="Compare"><span>{{ $product->quantity }}</span></a>
                                          </div><!-- End .product-action -->
                                          @if ($product->quantity >= 1)
                                              <livewire:product.add-cart-component :productId="$product->id"
                                                  :wire:key="$product->id" />
                                          @else
                                              <span class="btn-product btn-cart btn disabled">
                                                  <span>Out of stock</span>
                                              </span>
                                          @endif

                                          {{-- <a href="#" class="btn-product btn-cart"><span>add to cart</span></a> --}}
                                      </div><!-- End .product-list-action -->
                                  </div><!-- End .col-sm-6 col-lg-3 -->

                                  <div class="col-lg-6">
                                      <div class="product-body product-action-inner">
                                          <livewire:product.add-wishlist-component :productId="$product->id"
                                              :wire:key="$product->id" />
                                          <div class="product-cat">
                                              <a
                                                  href="{{ route('frontend.view-category', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                          </div><!-- End .product-cat -->
                                          <h3 class="product-title"><a
                                                  href="{{ route('frontend.view-product-detail', ['slug' => $product->slug]) }}">{{ $product->name }}
                                                  skirt</a></h3><!-- End .product-title -->

                                          <div class="product-content">
                                              <p>{{ $product->short_des }} </p>

                                          </div><!-- End .product-content -->
                                      </div><!-- End .product-body -->
                                  </div><!-- End .col-lg-6 -->
                              </div><!-- End .row -->
                          </div><!-- End .product -->
                      @endif
                  @endforeach
              @else
                  <div class="d-flex flex-column align-items-center">
                      <span class="mb-2">

                      </span>
                      <span>
                          <p class="text-danger">No matching products found. Please try a different
                              search term.</p>
                      </span>
                  </div>
              @endif

          </div><!-- End .products -->

      </div><!-- End .col-lg-9 -->
  </div><!-- End .row -->
