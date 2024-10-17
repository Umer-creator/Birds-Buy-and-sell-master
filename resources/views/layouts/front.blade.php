<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="">
    <meta name="author" content="p-themes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('frontend/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('frontend/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('frontend/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('frontend/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="birds">
    <meta name="application-name" content="Birds">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('frontend/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">


    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>


    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/skins/skin-demo-3.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/demos/demo-3.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome-free-6.3.0-web/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome-free-6.3.0-web/css/all.css') }}">
    @livewireStyles()
</head>

<body>

    <!-- begin app-main -->
    {{-- <a class="btn btn-square btn-inverse-light btn-xs d-inline-block mt-2 mb-0"
href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
<form id="logout-form" action="{{route('logout')}}" method="post">
@csrf
</form> --}}
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            {{-- Header Top --}}
            <section>
                <div class="header-top">
                    <div class="container">
                        <div class="header-left">
                            <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                        </div><!-- End .header-left -->

                        <div class="header-right">

                            <ul class="top-menu">
                                <li>
                                    <a href="#">Links</a>
                                    <ul>
                                        <li>
                                            <div class="header-dropdown">
                                                <a href="#">English</a>
                                                <div class="header-menu">
                                                    <ul>
                                                        <li><a href="#">English</a></li>
                                                        <li><a href="#">Urdu</a></li>
                                                        <li><a href="#">Spanish</a></li>
                                                    </ul>
                                                </div><!-- End .header-menu -->
                                            </div>
                                        </li>
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->utype === 'admin')
                                                    <li class="text-success">Admin:<a
                                                            href={{ route('admin.dashboard') }}>{{ Auth::user()->name }}</a>
                                                    </li>
                                                @endif

                                            @endauth
                                        @endif
                                        @if (session()->has('utype'))
                                        @else
                                            <li><a href={{ route('login') }}>Admin login </a>
                                        @endif
                                </li>
                            </ul>
                            </li>
                            </ul><!-- End .top-menu -->
                        </div><!-- End .header-right -->

                    </div><!-- End .container -->
                </div><!-- End .header-top -->
            </section>
            {{-- Header Middle --}}
            <section>

                <div class="header-middle">
                    <div class="container">
                        <div class="header-left">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>

                            <a href="index.html" class="logo">
                                <img src={{ asset('uploads/logo/birdslogo.jpg') }} alt="Bird Logo" width="105"
                                    height="25">
                            </a>
                        </div><!-- End .header-left -->

                        <div class="header-right reloadDiv">
                            <div class="header-search">
                                <a href="#" class="search-toggle" role="button" title="Search"><i
                                        class="icon-search"></i></a>

                            </div>


                            @auth
                                @if (Auth::user()->utype === 'user')
                                    <livewire:navbar.cart-and-wishlist-icon />
                                @endif
                            @else
                                <div class="wishlist">
                                    <a href="{{ route('login') }}" title="Wishlist">
                                        <div class="icon">
                                            <i class="icon-heart-o"></i>
                                        </div>
                                        <p>Wishlist</p>
                                    </a>
                                </div>

                                <div class="wishlist">
                                    <a href="{{ route('login') }}" title="Wishlist">
                                        <div class="icon">
                                            <i class="icon-shopping-cart"></i>

                                        </div>
                                        <p>Cart</p>
                                    </a>
                                </div>
                            @endauth




                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        {{-- <div class="account">
                                            <a href="{{ url('/dashboard') }}" title="Dashboard">
                                                <div class="icon">
                                                    <i class="icon-user"></i>
                                                </div>
                                                <p>Dashboard</p>
                                            </a>
                                        </div> --}}
                                        @if (Auth::user()->utype === 'user')
                                            <div class="account">
                                                <a href="{{ url('/user/dashboard') }}" title="Dashboard">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <p>User Dashboard</p>
                                                </a>
                                            </div>
                                        @elseif (Auth::user()->utype === 'admin')
                                            <div class="account">
                                                <a href="{{ route('admin.dashboard') }}" title="Dashboard">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <p>Admin Dashboard</p>
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="account">
                                            <a href="{{ url('/dashboard') }}" title="Login">
                                                <div class="icon">
                                                    <i class="icon-user"></i>
                                                </div>
                                                <p>Login/Register</p>
                                            </a>
                                        </div>
                                    @endauth
                                </div>
                            @endif



                            {{-- <div class="account">
                                <a href="  {{ route('login') }}" title="My account">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Account</p>
                                </a>
                            </div> --}}

                        </div><!-- End .header-right -->
                    </div><!-- End .container -->
                </div><!-- End .header-middle -->

            </Section>
            {{-- Header bottom --}}
            <section>
                <div class="header-bottom sticky-header">
                    <div class="container">
                        <div class="header-left" id="Categories">
                            <livewire:navbar.categories-dropdown />
                        </div><!-- End .header-left -->

                        <div class="header-center">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container active">
                                        <a href="{{ url('/') }}" class="sf-with-ul">Home</a>
                                    </li>
                                    <li>
                                        <a id="products" href="{{ url('products') }}"
                                            class="sf-with-ul">Products</a>
                                    </li>
                                    <li>

                                        <a href="{{ url('stores') }}" class="sf-with-ul">Stores</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('forum') }}" class="sf-with-ul">Forum</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.about') }}" class="sf-with-ul">About us</a>
                                    </li>
                                    {{-- <li>
                                        <a href="" class="sf-with-ul">Elements</a>

                                        <ul>
                                            <li><a href="">Products</a></li>
                                        </ul>
                                    </li> --}}
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-center -->

                        <div class="header-right">
                            <i class="la la-lightbulb-o"></i>


                            <p>{{ env('APP_NAME') }}<span class="highlight">&nbsp;You can buy and Sell</span></p>
                        </div>
                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
            </section>
        </header><!-- End .header -->

        <main class="main">
            @yield('front')
        </main><!-- End .main -->

        {{-- Start Ending icons --}}
        <section>
            <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"> Shipping </h3><!-- End .icon-box-title -->

                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Online Orders</h3><!-- End .icon-box-title -->
                                    <p>24/7</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Buy and Sell</h3><!-- End .icon-box-title -->
                                    <p>when you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>
        </section>
        {{-- End Ending icons --}}

        <footer class="footer">
            {{-- Subscribe section   --}}
            <section>
                <div class="cta bg-image bg-dark pt-4 pb-5 mb-0">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <div class="cta-heading text-center">
                                    <h3 class="cta-title text-white">Keep in touch with us</h3>
                                    <!-- End .cta-title -->
                                    <p class="cta-desc text-white">browser <span class="font-weight-normal">products
                                        </span> for buying</p><!-- End .cta-desc -->
                                </div><!-- End .text-center -->


                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white"
                                        placeholder="Browser and Buy the Birds Products" aria-label="Email Adress"
                                        required disabled>
                                    <div class="input-group-append">
                                        <a href="/products">
                                            <button class="btn btn-primary"><span>Products</span><i
                                                    class="icon-long-arrow-right"></i></button>
                                        </a>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->

                            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cta -->
            </section>
            {{-- Middle footer links etc --}}
            <section>
                <div class="footer-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="widget widget-about">
                                    {{-- <img src=" {{ asset('frontend/assets/images/demos/demo-4/logo-footer.png" class="footer-logo') }}"
                                        alt="Footer Logo" width="105" height="25"> --}}
                                    <p> Thank you for visiting Birds Buy and Selling, your trusted marketplace for all
                                        things birds. Whether you're a passionate avian enthusiast or looking to bring a
                                        feathery friend into your life, we're here to assist you. </p>
                                    <div class="widget-call">
                                        <i class="icon-phone"></i>
                                        Got Question? Call us 24/7
                                        <a href="tel:#">+0123 456 789</a>
                                    </div><!-- End .widget-call -->
                                </div><!-- End .widget about-widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-6">
                                <div class="widget">
                                    <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="/about">About Birds buy and Sell</a></li>
                                        <li><a href="/stores">Store</a></li>

                                        <li><a href="/products">Birds Products</a></li>
                                        <li><a href="/forum">Forum</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            {{-- <div class="col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Payment Methods</a></li>
                                        <li><a href="#">Money-back guarantee!</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Terms and conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 --> --}}

                            {{-- <div class="col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Sign In</a></li>
                                        <li><a href="cart.html">View Cart</a></li>
                                        <li><a href="#">My Wishlist</a></li>
                                        <li><a href="#">Track My Order</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 --> --}}
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-middle -->
            </section>
            {{-- Footer end section social media links --}}
            <section>
                <div class="footer-bottom">
                    <div class="container">
                        <p class="footer-copyright">Copyright © 2022 Birds Buy and Sell. All Rights Reserved.</p>
                        <!-- End .footer-copyright -->
                        <div class="social-icons social-icons-color">
                            <span class="social-label">Social Media</span>
                            <a href="#" class="social-icon social-facebook" title="Facebook"
                                target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram"
                                target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest"
                                target="_blank"><i class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .container -->
                </div>
            </section>
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->


    {{-- Start  Mobile menu Section --}}
    <section>
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-container mobile-menu-light">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-close"></i></span>

                <form action="#" method="get" class="mobile-search">
                    <label for="mobile-search" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                        placeholder="Search in..." required="">
                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </form>

                <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                            role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab"
                            role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                    </li>
                </ul>
                {{-- Start  Mobile tabs --}}
                <section>
                    <div class="tab-content">
                        {{--  start mobile  tabl 1 --}}
                        <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                            aria-labelledby="mobile-menu-link">
                            {{-- Pages list on mobile --}}
                            <section>
                                <nav class="mobile-nav">
                                    <ul class="mobile-menu">
                                        <li class="active">
                                            <a href="{{ url('/') }}">Home</span></a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ url('products') }}">Products</a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ url('store') }}">Stores</a>
                                        </li>
                                        <li class="active">

                                            <a href="{{ url('forum') }}">Forum</span></a>
                                        </li>
                                        <li class="active">

                                            <a href="{{ url('about') }}">About</a>
                                        </li>
                                    </ul>
                                </nav><!-- End .mobile-nav -->
                            </section>
                            {{-- End  Pages list on mobile --}}
                        </div><!-- .End .tab-pane -->
                        {{--  end mobile  tabl 1 --}}

                        {{--  start mobile  tabl 2 --}}
                        <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel"
                            aria-labelledby="mobile-cats-link">
                            <nav class="mobile-cats-nav">
                                <ul class="mobile-cats-menu">
                                    <livewire:navbar.categories-dropdown />
                                </ul><!-- End .mobile-cats-menu -->
                            </nav><!-- End .mobile-cats-nav -->
                        </div><!-- .End .tab-pane -->
                        {{--  end  mobile  tabl 2 --}}
                    </div><!-- End .tab-content -->
                </section>
                {{-- end Mobile tabs --}}
                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                            class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                            class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                            class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                            class="icon-youtube"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div>
    </section>
    {{-- End  Mobile menu Section --}}

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
</body>
<!-- Plugins JS File -->
<section>
    {{-- import in top --}}
    {{-- <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script> --}}

    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('user/js/sweetalert.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/demos/demo-3.js') }}"></script>
    @livewireScripts
</section>
@yield('scripts')
</body>

</html>
