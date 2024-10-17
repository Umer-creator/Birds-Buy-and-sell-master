@extends('layouts.front')

@section('front')
    {{--  Start Main Slider and cards --}}
    <Section>
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8">
                        {{-- Start Top crosol --}}
                        <section>
                            <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                                <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside owl-loaded owl-drag"
                                    data-toggle="owl"
                                    data-owl-options="{
                                            &quot;nav&quot;: false, 
                                            &quot;dots&quot;: true,
                                            &quot;responsive&quot;: {
                                                &quot;768&quot;: {
                                                    &quot;nav&quot;: true,
                                                    &quot;dots&quot;: false  }}
                                        }">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-2336px, 0px, 0px); transition: all 0.4s ease 0s; width: 4673px;">
                                            {{-- start Slides 1 --}}
                                            <div class="owl-item cloned" style="width: 778.683px;">
                                                <div class="intro-slide">
                                                    <figure class="slide-image">
                                                        <picture>
                                                            <source media="(max-width: 480px)"
                                                                srcset="{{ asset('frontend/assets/gallery/slide-1.jpg') }}">
                                                            <img src=" {{ asset('frontend/assets/gallery/slide-1.jpg') }}"
                                                                alt="">
                                                        </picture>
                                                    </figure><!-- End .slide-image -->

                                                    <div class="intro-content">
                                                        <h3 class="intro-subtitle text-primary">Daily Deals</h3>
                                                        <!-- End .h3 intro-subtitle -->
                                                        <h1 class="intro-title">
                                                            Birds <br>Website
                                                        </h1><!-- End .intro-title -->

                                                        <a href="" class="btn btn-primary btn-round">
                                                            <span>Click Here</span>
                                                            <i class="icon-long-arrow-right"></i>
                                                        </a>
                                                    </div><!-- End .intro-content -->
                                                </div>
                                            </div>
                                            {{-- end slide 1 --}}
                                        </div>
                                    </div>
                                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                                class="icon-angle-left"></i></button><button type="button"
                                            role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
                                    </div>
                                    <div class="owl-dots disabled"></div>
                                </div><!-- End .intro-slider owl-carousel owl-simple -->

                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->
                        </section>
                        {{-- End  Top crosol --}}
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        {{-- start Intro banner --}}
                        <section>
                            <div class="intro-banners">
                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/assets/gallery/banner-1.jpg') }}">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Birds</a>
                                        </h4>
                                        <!-- End .banner-subtitle -->

                                        <h3 class="banner-title"><a href="{{ url('/products') }}">Products <br></a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{ url('/products') }}" class="banner-link">Shop Now<i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        <img src="{{ asset('frontend/assets/gallery/banner-1.jpg') }}">
                                    </a>
                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Birds</a>
                                        </h4>
                                        <!-- End .banner-subtitle -->

                                        <h3 class="banner-title"><a href="{{ url('/stores') }}">Seller Stores <br></a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{ url('/stores') }}" class="banner-link">Shop Now<i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-0">
                                    <a href="#">
                                        <img src="{{ asset('frontend/assets/gallery/banner-1.jpg') }}">
                                    </a>
                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#"> Birds</a>
                                        </h4>
                                        <!-- End .banner-subtitle -->

                                        <h3 class="banner-title"><a href="{{ url('/forum') }}">Forum<br></a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{ url('/forum') }}" class="banner-link">Explore now<i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .intro-banners -->
                        </section>
                        {{-- end  Intro banner --}}
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
    </Section>
    {{--  End Main Slider and cards --}}

    {{--  Start Main catagory  cards --}}
    <section>
        <div class="container">
            <livewire:home.popular-category />
        </div>

        <div class="container">
            <livewire:home.categories />
        </div>
    </section>
    {{--  End Main catagory cards --}}

    {{-- Start Popular proucts --}}
    <section>
        <livewire:home.featured-product />
        <livewire:home.products />
    </section>
    {{-- End Popular proucts --}}
@endsection
