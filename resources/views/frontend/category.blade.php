@extends('layouts.front')
@section('front')
    <section>
        {{-- start page header  --}}
        <section>

            <div class="page-header text-center mt-5 ml-5 mr-5"
                style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
                <div class="container">
                    <h1 class="page-title">Category <span>Love Birds</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
        </section>
        {{-- end  page header  --}}

        {{-- start page top  pages nav --}}
        <section>
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                        <li class="breadcrumb-item active" aria-current="page">Love Birds</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
        </section>
        {{-- end  page top  pages nav --}}

        {{-- start Main page --}}
        <section>
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        {{--  Start Mid side birds content area --}}
                        <div class="col-lg-12">
                            {{-- start  Top Toolbox --}}
                            <section>
                                <div class="toolbox">
                                    <div class="toolbox-left">
                                        <div class="toolbox-info">
                                            Showing <span>9 of 56</span> Birds
                                        </div><!-- End .toolbox-info -->
                                    </div><!-- End .toolbox-left -->

                                    <div class="toolbox-right">
                                        <div class="toolbox-sort">
                                            <label for="sortby">Sort by:</label>
                                            <div class="select-custom">
                                                <select name="sortby" id="sortby" class="form-control">
                                                    <option value="popularity" selected="selected">Most Popular</option>
                                                    <option value="rating">Most Rated</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </div>
                                        </div><!-- End .toolbox-sort -->

                                    </div><!-- End .toolbox-right -->
                                </div><!-- End .toolbox -->
                            </section>
                            {{-- end Top Toolbox --}}
                            {{-- Start Products Grid --}}
                            <section>
                                <div class="products mb-3">
                                    <div class="row justify-content-center">
                                        {{-- start bird --}}
                                        @for ($i = 0; $i < 15; $i++)
                                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                                <div class="product product-7 text-center">
                                                    <figure class="product-media">
                                                        {{-- <span class="product-label label-new">New</span> --}}
                                                        <a href="">
                                                            <img src="{{ asset('frontend/assets/gallery/product-4.jpg') }}"
                                                                alt="birds image" class="product-image">
                                                        </a>

                                                        <div class="product-action-vertical">
                                                            <a href="#"
                                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                                    to
                                                                    wishlist</span></a>
                                                            <a href="" class="btn-product-icon btn-quickview"
                                                                title="Quick view"><span>view</span></a>
                                                        </div><!-- End .product-action-vertical -->

                                                        <div class="product-action">
                                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                                    cart</span></a>
                                                        </div><!-- End .product-action -->
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <div class="product-cat">
                                                            <a href="#">Love Birds</a>
                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a href="product.html">Pakistani
                                                                Bird</a>
                                                        </h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            Rs:500.00
                                                        </div><!-- End .product-price -->
                                                        <div class="ratings-container">
                                                            <div class="ratings">
                                                                <div class="ratings-val" style="width: 20%;"></div>
                                                                <!-- End .ratings-val -->
                                                            </div><!-- End .ratings -->
                                                            <span class="ratings-text">( 2 Reviews )</span>
                                                        </div><!-- End .rating-container -->

                                                        <div class="product-nav product-nav-thumbs">
                                                            <a href="#" class="active">
                                                                <img src=" {{ asset('frontend/assets/gallery/product-4-thumb.jpg') }}"
                                                                    alt="product desc">
                                                            </a>
                                                            <a href="#">
                                                                <img src=" {{ asset('frontend/assets/gallery/product-4-thumb.jpg') }}"
                                                                    alt="product desc">
                                                            </a>
                                                            <a href="#">
                                                                <img src=" {{ asset('frontend/assets/gallery/product-4-thumb.jpg') }}"
                                                                    alt="product desc">
                                                            </a>

                                                        </div><!-- End .product-nav -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                        @endfor
                                        {{-- end bird --}}
                                    </div><!-- End .row -->
                                </div><!-- End products grid  -->
                            </section>
                            {{-- End Products Grid --}}

                            {{-- <!-- Start Pagination --> --}}
                            <section>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link page-link-prev" href="#" aria-label="Previous"
                                                tabindex="-1" aria-disabled="true">
                                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page"><a class="page-link"
                                                href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="">2</a></li>
                                        <li class="page-item"><a class="page-link" href="">3</a></li>
                                        <li class="page-item-total">of 6</li>
                                        <li class="page-item">
                                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </section>
                            {{-- <!-- End Pagination --> --}}

                        </div><!-- End .col-lg-9 -->
                        {{--  end  Mid side birds content area --}}

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </section>
        {{-- end  Main page --}}


    </section>
@endsection
