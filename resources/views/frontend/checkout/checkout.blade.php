@extends('layouts.front')
@section('front')
    {{-- start page header  --}}
    <section>

        <div class="page-header text-center mt-5 ml-5 mr-5"
            style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
            <div class="container">
                <h1 class="page-title">Order<span>Checkout</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </section>
    {{-- end  page header  --}}

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <livewire:checkout.checkout />
    </div><!-- End .page-content -->
@endsection
