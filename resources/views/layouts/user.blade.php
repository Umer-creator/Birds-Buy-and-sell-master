<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('user/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href=" {{ asset('user/vendors/css/vendor.bundle.addons.css') }}">
    {{-- start page header  --}}
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <!-- endinject -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}" />
    @livewireStyles()
</head>

<body class="sidebar-fixed">



    <div class="container-scroller">

        {{-- Start top Navbar --}}
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">

            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">


                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

                            @auth
                                <img src={{ asset(Auth::user()->profile_photo_path) }} alt="image" />
                            @endauth
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href={{ route('user.account.setting') }}>
                                <i class="fas fa-cog text-primary"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>


                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <button class="dropdown-item" type="submit">
                                    <i class="fas fa-power-off text-primary"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        {{-- End top Navbar --}}

        <div class="container-fluid page-body-wrapper">
            {{-- Start Sidebar menu --}}
            <section>
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <div class="nav-link">
                                <div class="profile-image">

                                    @auth
                                        <img src={{ asset(Auth::user()->profile_photo_path) }} alt="image" />
                                    @endauth
                                </div>
                                <div class="profile-name">
                                    <p class="name">

                                        @auth
                                            @if (Auth::user()->utype === 'user')
                                                {{ Auth::user()->name }}
                                            @endif
                                        @endauth
                                    </p>
                                    <p class="designation">
                                        Buyer Dashboard

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="  {{ url('user/dashboard') }}">
                                <i class="fa fa-home menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('user.profile.edit') }}">
                                <i class="far fa-user menu-icon"></i>
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.view.orders') }}">
                                <i class="fa fa-shopping-cart menu-icon"></i>
                                <span class="menu-title">Orders</span>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.account.setting') }}">
                                <i class="fa fa-lock menu-icon"></i>
                                <span class="menu-title">Account</span>
                            </a>
                        </li>


                        @auth
                            @if (Auth::user()->seller_status)
                                <li class="nav-item">
                                    <a class="nav-link" href={{ route('seller.dashboard') }}>
                                        <i class="fa fa-lock menu-icon"></i>
                                        <span class="menu-title">Switch to Seller Mode</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href={{ route('user.become-a-seller.view') }}>
                                        <i class="fa fa-user menu-icon"></i>
                                        <span class="menu-title">Become a seller</span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </nav>
            </section>
            {{-- End  Sidebar manu --}}


            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('user')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                            © 2022 <a href="{{ url('/') }}" target="">Birds buy &
                                Selling</a>. All rights
                            reserved.
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <section>
        <!-- plugins:js -->

        <script src=" {{ asset('user/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="  {{ asset('user/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="    {{ asset('user/js/off-canvas.js') }}"></script>
        <script src="{{ asset('user/js/hoverable-collapse.js') }} "></script>
        <script src="{{ asset('user/js/misc.js') }}"></script>
        <script src="{{ asset('user/js/settings.js') }}"></script>
        <script src="{{ asset('user/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('user/js/dashboard.js') }}"></script>
        <script src="{{ asset('user/js/file-upload.js') }}"></script>
        <!-- End custom js for this page-->
        <script src="{{ asset('user/js/wizard.js') }}"></script>

        {{-- dopify  userprofile page --}}
        <script src="{{ asset('user/js/dropify.js') }}"></script>


        {{-- <!-- Custom js for this page    user-orderpage-table-js--> --}}
        <script src="{{ asset('user/js/data-table.js') }}"></script>
        <script src="{{ asset('user/js/sweetalert.js') }}"></script>


        @livewireScripts()
    </section>

</body>




</html>
