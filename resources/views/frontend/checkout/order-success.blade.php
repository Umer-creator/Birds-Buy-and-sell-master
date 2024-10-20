@extends('layouts.front')
@section('front')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Checkout</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Place Order</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="error-content text-center" style="background-image: url(assets/images/backgrounds/error-bg.jpg)">
            <div class="container">
                <h1 class="error-title">Payment successfull</h1><!-- End .error-title -->
                <p>Your order is place successfully</p>
                <a href="{{ url('/') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                    <span>BACK TO HOMEPAGE</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div><!-- End .container -->
        </div><!-- End .error-content text-center -->
    </main><!-- End .main -->
@endsection
