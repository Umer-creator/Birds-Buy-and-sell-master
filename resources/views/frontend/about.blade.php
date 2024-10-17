@extends('layouts.front')
@section('front')
    {{-- start page header  --}}
    <section>

        <div class="page-header text-center mt-5 ml-5 mr-5"
            style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
            <div class="container">
                <h1 class="page-title">About us <span>Birds Buy and Sell</span></h1>
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
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    </section>
    {{-- end  page top  pages nav --}}



    <section>
        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <h2 class="title">Our Vision</h2><!-- End .title -->
                        <p>
                            Our Vision:

                            At Birds Buy and Selling, our vision is to create a vibrant and trusted marketplace for bird
                            enthusiasts, where they can discover, buy, and sell a wide variety of birds. We envision a
                            platform that brings together individuals who share a passion for birds, fostering a community
                            where knowledge and expertise are exchanged freely.

                        </p>
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <h2 class="title">Our Mission</h2><!-- End .title -->
                        <p>
                            Our Vision:

                            At Birds Buy and Selling, our vision is to create a vibrant and trusted marketplace for bird
                            enthusiasts, where they can discover, buy, and sell a wide variety of birds. We envision a
                            platform that brings together individuals who share a passion for birds, fostering a community
                            where knowledge and expertise are exchanged freely.




                        </p>
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="mb-5"></div><!-- End .mb-4 -->
            </div><!-- End .container -->


        </div><!-- End .page-content -->


        <div class="bg-light-2 pt-6 pb-7 mb-6">
            <div class="container">
                <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                {{-- <img src=" {{ asset('frontend/assets/images/team/about-2/member-1.jpg') }}"
                                    alt="member photo"> --}}

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content">
                                <h3 class="member-title">Shayan<span>Owner </span></h3>
                                <!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-6">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                {{-- <img src=" {{ asset('frontend/assets/images/team/about-2/member-1.jpg') }}"
                                    alt="member photo"> --}}

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content">
                                <h3 class="member-title">Mohaiz<span>Manager</span></h3>
                                <!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row -->


            </div><!-- End .container -->
        </div>


    </section>
@endsection
