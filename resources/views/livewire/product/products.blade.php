{{-- start Main page --}}
<section>
    <div class="page-content">
        <div class="container">
            <div class="row">

                {{--  Start left sidebar --}}
                {{--  Start left sidebar --}}
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" wire:click="clear_filter()" class="sidebar-filter-clear">Clean filter</a>
                        </div><!-- End .widget widget-clean -->
                        <div class="widget widget-categories">

                            <div class="widget-body">
                                <div class="accordion" id="widget-cat-acc">
                                    <div class="acc-item">
                                        <h5>
                                            <a role="button" data-toggle="collapse" href="#collapse-1"
                                                aria-expanded="true" aria-controls="collapse-1" class="">
                                                Categories
                                            </a>
                                        </h5>
                                        <div id="collapse-1" class="collapse show" data-parent="#widget-cat-acc"
                                            style="">
                                            <div class="collapse-wrap">
                                                <ul>

                                                    @foreach ($categories as $category)
                                                        <li wire:click="category_filter({{ $category->id }})">
                                                            <a>{{ $category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- End .collapse-wrap -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .acc-item -->

                                    <div class="acc-item">
                                        <h5>
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                Stores
                                            </a>
                                        </h5>
                                        <div id="collapse-2" class="collapse show" data-parent="#widget-cat-acc"
                                            style="">
                                            <div class="collapse-wrap">
                                                <ul>
                                                    @foreach ($stores as $store)
                                                        <li wire:click="store_filter({{ $store->id }})">
                                                            <a>{{ $store->name }}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div><!-- End .collapse-wrap -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .acc-item -->

                                </div><!-- End .widget-body -->
                            </div>
                        </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
                {{--  Start Mid side birds content area --}}
                <div class="col-lg-9">
                    {{-- start  Top Toolbox --}}
                    <section>
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Total:
                                    <span>{{ $total_product = $count = $products->where('status', 1)->count() }}</span>
                                    Birds Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">

                                <div class="header-search mr-5">
                                    <form>
                                        <div class="header-search-wrapper d-flex">
                                            <label for="q" class="sr-only">Search</label>
                                            <input wire:model.debounce.500ms="search" type="search"
                                                class="form-control mr-3" name="q" id="myInput"
                                                placeholder="Search product..." required="">

                                        </div><!-- End .header-search-wrapper -->
                                    </form>


                                </div>
                                <div class="toolbox-sort">
                                    <label for="sortby"> Sort by: </label>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ $sort }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <button id="filtername" class="dropdown-item btn btn-danger"
                                                wire:click="sortBy('name')">Name</button>
                                            <button class="dropdown-item btn btn-danger"
                                                wire:click="sortBy('price')">Price</button>
                                            <button class=" dropdown-item btn btn-danger"
                                                wire:click="sortBy('created_at')">Date</button>

                                        </div>
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

                                @if ($products->where('status', 1)->count())
                                    @foreach ($products as $product)
                                        @if ($product->status)
                                            <div class="col-6 col-md-4 col-lg-4 col-xl-3  ">
                                                <div class="product product-7 text-center shadow ">
                                                    <figure class="product-media">
                                                        {{-- <span class="product-label label-new">New</span> --}}
                                                        <a href="">

                                                            {{-- <img src="{{ asset('frontend/assets/gallery/product-4.jpg') }}" --}}

                                                            <img src="{{ asset($product->image) }}"alt="birds image"
                                                                style=" height:200px;width:200px;"
                                                                class="product-image image-fluid">
                                                        </a>

                                                        <div class="product-action-vertical">



                                                            {{-- <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" --}}
                                                            <a href="{{ route('frontend.view-product-detail', ['slug' => $product->slug]) }}"
                                                                class="btn-product-icon  btn-expandable">
                                                                <i class="icon-info-circle"></i>
                                                                <span>View</span></a>

                                                        </div><!-- End .product-action-vertical -->

                                                        {{-- <div class="product-action">
                                                        <span class="btn-product btn-cart btn"><span>add
                                                                to
                                                                cart</span></span>
                                                    </div><!-- End .product-action --> --}}
                                                        @if ($product->quantity >= 1)
                                                            <div class="product-action">
                                                                <livewire:product.add-cart-component :productId="$product->id"
                                                                    :wire:key="$product->id" />
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
                                                            <a href="#">{{ $product->category->name }}</a>
                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a
                                                                href="product.html">{{ $product->name }}</a>
                                                        </h3><!-- End .product-title -->

                                                        <div class="product-price">
                                                            Rs: {{ $product->price }}
                                                        </div><!-- End .product-price -->

                                                        <div class="rating-container">
                                                            @php
                                                                $reviews = $product->review;
                                                                $averageRating = $reviews->avg('rating');
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

                                                        </div>

                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                        @endif
                                    @endforeach
                                @else
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="mb-2">
                                            <p class="text-primary font-weight-bold cursor-pointer text-danger"
                                                wire:click="clear_filter()">
                                                View All Products
                                            </p>
                                        </span>
                                        <span>
                                            <p class="text-danger">No matching products found. Please try a different
                                                search term.</p>
                                        </span>
                                    </div>


                                @endif

                                {{-- end bird --}}
                            </div><!-- End .row -->
                        </div><!-- End products grid  -->
                    </section>
                    {{-- End Products Grid --}}

                    {{-- <!-- Start Pagination --> --}}
                    <section>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <style>
                                    .pl-4,
                                    .px-4 {
                                        padding-left: 1.5em Important
                                    }

                                    .pb-2,
                                    .py-2 {
                                        padding-bottom: :.5em Important
                                    }

                                    .pt-2,
                                    .py-2 {
                                        padding-top: .5em Important
                                    }

                                    .bg-white {
                                        background-color: #fff Important
                                    }

                                    .border {
                                        border: :1px solid #dee2e6 Important
                                    }

                                    nav svg {
                                        height: 20px
                                    }

                                    svg {
                                        overflow: hidden;
                                        vertical-align: :middle
                                    }

                                    .wrap-pagination-info .hidden {
                                        display: block Important
                                    }

                                    .wrap-pagination-info .rounded-I-md {
                                        margin-right: 5px
                                    }

                                    .wrap-pagination-info .rounded-r-md {
                                        margin-left: 5px;
                                        background-color: #fff Important
                                    }
                                </style>
                                {{-- {{ $products->links() }} --}}
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
{{-- @livewireScripts --}}
