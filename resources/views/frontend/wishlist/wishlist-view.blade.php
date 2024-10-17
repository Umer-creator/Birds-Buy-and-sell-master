@extends('layouts.front')
@section('front')
    <main class="main">
        {{-- start page header  --}}
        <section>
            <div class="page-header text-center mt-5 ml-5 mr-5"
                style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
                <div class="container">
                    <h1 class="page-title">Products<span>Wishlist</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
        </section>
        {{-- end  page header  --}}

        {{-- start page top  pages nav --}}
        <section>
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
        </section>
        {{-- end  page top  pages nav --}}

        <div class="page-content">
            <livewire:wishlist.wishlist-view />

        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
