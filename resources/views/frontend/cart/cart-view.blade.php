@extends('layouts.front')
@section('front')
    {{-- start page header  --}}
    <section>
        <div class="page-header text-center mt-5 ml-5 mr-5"
            style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
            <div class="container">
                <h1 class="page-title">Products<span>Cart</span></h1>
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
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    </section>
    {{-- end  page top  pages nav --}}

    {{-- start cart --}}
    <section>
        <div class="page-content ">
            <div class="cart">
                <livewire:cart.view-cart />

            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </section>
    {{-- end cart --}}
@endsection
