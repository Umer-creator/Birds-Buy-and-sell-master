@extends('layouts.front')
@section('front')
    <div class="page-content">
        <div class="container">

            {{-- src="{{ asset($category->image) }}" --}}
            <div class="row mt-7 shadow p-5 m-5">

                <article class="entry entry-list ">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="{{ url('/') }}">Birds Buy and Sell</a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <b>{{ $category->created_at->diffForHumans() }}</b>
                                    <span class="meta-separator">|</span>
                                    <b> {{ $category->products->count() }} Products</b>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="">{{ $category->name }}</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    <b class="text-muted">Birds Category</b>

                                </div><!-- End .entry-cats -->

                                <div class="entry-content">
                                    <p>{{ $category->description }}</p>

                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </div><!-- End .col-md-8 -->

                        <div class="col-md-5">
                            <figure class="entry-media">
                                <a href="">
                                    <img src="{{ asset($category->image) }}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </article>
            </div>

            <div class="row shadow  p-5">

                <livewire:category.category-detail />
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    @endsection
