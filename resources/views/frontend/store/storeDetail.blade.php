@extends('layouts.front')
@section('front')
    <div class="page-content">
        <div class="container">
            <div class="row mt-7 shadow p-5 m-5">

                <article class="entry entry-list ">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="{{ url('/') }}">{{ $store->user->name }}</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <b>{{ $store->created_at->diffForHumans() }}</b>
                                    <span class="meta-separator">|</span>
                                    <b> {{ $store->product->count() }} Products</b>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="">{{ $store->name }}</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    <b class="text-muted">Birds Store</b>

                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>{{ $store->description }}</p>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="entry-cats">
                                            <b class="text-muted">Store City</b>
                                        </div><!-- End .entry-cats -->
                                        <div class="entry-content">
                                            <p>{{ $store->city }}</p>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="entry-cats">
                                            <b class="text-muted">Store Address</b>
                                        </div><!-- End .entry-cats -->
                                        <div class="entry-content">
                                            <p>{{ $store->address }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="entry-cats">
                                            <b class="text-muted">Store Phone</b>
                                        </div><!-- End .entry-cats -->
                                        <div class="entry-content">
                                            <p>{{ $store->phone }}</p>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="entry-cats">
                                            <b class="text-muted">Store Email</b>
                                        </div><!-- End .entry-cats -->
                                        <div class="entry-content">
                                            <p>{{ $store->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="entry-cats">
                                            <b class="text-muted">Store Seller</b>
                                        </div><!-- End .entry-cats -->
                                        <div class="entry-content">
                                            <p>{{ $store->user->name }}</p>
                                        </div>
                                    </div>
                                </div>





                                <!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </div><!-- End .col-md-8 -->

                        <div class="col-md-5">
                            <figure class="entry-media">
                                <a href="">
                                    <img src="{{ asset($store->image) }}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </article>
            </div>


            <div class="row mt-5 shadow  p-5">
                <livewire:store.store-detail />
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    @endsection
