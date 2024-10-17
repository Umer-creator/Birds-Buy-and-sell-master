@if ($categories->count())
    <div class="row">
        <div class="col-md-12 col-sm-2 col-xl-12 mt-5">
            <h2 class="title title-border">Birds Categories</h2>
            <!-- End .title -->
            {{-- owl-simple  --}}
            <div class="owl-carousel owl-nav-top carousel-equal-height carousel-with-shadow mt-5" data-toggle="owl"
                data-owl-options='{"nav":false, "dots": false,"margin": 20,"loop": false,"responsive": {"0": { "items":2},"480": {"items":2 },"768": { "items":3},"1200": {"items":4}}}'>

                @foreach ($categories as $category)
                    <div class="product shadow">
                        <figure class="product-media">

                            <a href="{{ route('frontend.view-category', ['slug' => $category->slug]) }}">
                                <img style="
                                  width: 300px;height: 200px;"
                                    class="product-image img-fluid" src="{{ asset($category->image) }}"
                                    alt="Birds image">
                            </a>

                            <div class="product-action">
                                <a href="{{ route('frontend.view-category', ['slug' => $category->slug]) }}"class="btn-product "
                                    title="Browse">
                                    <i class="icon-info-circle"></i>
                                    <span> Browse
                                        Catagory</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="">Popular Category</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title">{{ $category->name }}</h3>
                            <!-- End .product-title -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach

            </div><!-- End .owl-carousel -->

        </div>
    </div>
@endif
