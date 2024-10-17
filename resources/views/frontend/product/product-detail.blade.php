@extends('layouts.front')
@section('front')
    {{-- start page top  pages nav --}}
    <section>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2 mt-5">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Birds</li>
                    <li class="breadcrumb-item active" aria-current="page">Pakistani Birds</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    </section>
    {{-- end  page top  pages nav --}}
    <section>
        <livewire:product.product-detail />
    </section>
@endsection
