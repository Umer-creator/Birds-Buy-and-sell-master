@extends('layouts.front')
@section('front')
    <section>
        {{-- start page header  --}}
        <section>

            <div class="page-header text-center mt-5 ml-5 mr-5"
                style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
                <div class="container">
                    <h1 class="page-title">Birds<span>Buy now </span></h1>
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
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
        </section>
        {{-- end  page top  pages nav --}}

        {{-- start Main page --}}
        @if (isset($data))
            <livewire:product.products :type="$data['type']" :id="$data['id']" />
        @else
            <livewire:product.products />
        @endif

        {{-- end  Main page --}}


    </section>
@endsection
