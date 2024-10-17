<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="{{ asset('user/js/sweetalert.js') }}"></script>
    @livewireStyles()
</head>


<body class="sidebar-fixed">
    <div class="container-scroller">
        {{-- Start top Navbar --}}
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/"><img src=" {{ asset('uploads/logo/birdsLogo.jpg') }}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href=""><img
                        src=" {{ asset('user/images/logo-mini.sv') }}" alt="logo" /></a>
            </div>
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
                            <a class="dropdown-item" href={{ route('admin.account') }}>
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
                                            @if (Auth::user()->utype === 'admin')
                                                {{ Auth::user()->name }}
                                            @endif
                                        @endauth
                                    </p>
                                    <p class="designation">
                                        Super Admin
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fa fa-home menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Category Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="page-layouts">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('category.add') }}>Add Category</a>
                                    </li>
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('categories.get') }}>View Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>




                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Store Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="product">
                                <ul class="nav flex-column sub-menu">
                                    @auth
                                        @if (Auth::user()->seller_status)
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href={{ route('admin.store.view') }}>My Store </a>
                                            </li>
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href={{ route('product.add') }}>Add Product In
                                                    Store</a>
                                            </li>
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href={{ route('products.get') }}>View Store
                                                    Products</a>
                                            </li>

                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href={{ route('admin.store.settings') }}>Store
                                                    Settings
                                                    <span class="ai-settings"></span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="nav-item d-none d-lg-block">
                                                <a class="nav-link" href={{ route('admin.store.create') }}>Create store
                                                </a>
                                            </li>
                                        @endif
                                    @endauth



                                </ul>
                            </div>
                        </li>








                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#store" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Seller's Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="store">
                                <ul class="nav flex-column sub-menu">

                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.approved.stores') }}>Approved
                                            Seller's Stores
                                        </a>
                                    </li>

                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.notApproved.stores') }}>Non-Approved
                                            Seller's Stores </a>
                                    </li>


                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('stores.products.get') }}>Seller's
                                            Stores Products</a>
                                    </li>


                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Order Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="order">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.view.orders') }}>View Orders</a>
                                    </li>

                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.view.store.payments') }}>Store Order
                                            payment</a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Payments Management</span>
                                <i class="menu-arrow"></i>
                            </a>

                            <div class="collapse" id="payment">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.stores.transactions') }}>View
                                            Transactions</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">User Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.view.users') }}>View Users</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#account" aria-expanded="false"
                                aria-controls="page-layouts">
                                <i class="fab fa-trello menu-icon"></i>
                                <span class="menu-title">Account Management</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="account">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.profile') }}>Profile</a>
                                    </li>
                                    <li class="nav-item d-none d-lg-block">
                                        <a class="nav-link" href={{ route('admin.account') }}>Account Settings</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                    </ul>
                </nav>
            </section>
            {{-- End  Sidebar manu --}}


            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('admin')
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
        <!-- Main JS File -->
        <script src="{{ asset('user/js/editorDemo.js') }}"></script>
        <!-- endinject -->
        {{-- dopify  image pickeer page --}}
        <script src="{{ asset('user/js/file-upload.js') }}"></script>
        <!-- Custom js for this page-->
        <script src="{{ asset('user/js/dashboard.js') }}"></script>
        <!-- End custom js for this page-->
        <!-- End custom js for this page-->
        <script src="{{ asset('user/js/wizard.js') }}"></script>

        {{-- dopify  userprofile page --}}
        <script src="{{ asset('user/js/dropify.js') }}"></script>

        {{-- toast notifications  --}}
        <script src="{{ asset('user/js/toastDemo.js') }}"></script>

        {{-- <!-- Custom js for this page    seller-products page-table-js--> --}}
        <script src="{{ asset('user/js/data-table.js') }}"></script>

        {{-- validations --}}
        <script src="{{ asset('user/js/form-validation.js') }}"></script>
        <script src="{{ asset('user/js/bt-maxLength.js') }}"></script>
        {{-- alerts --}}
        <script src="{{ asset('user/js/alerts.js') }}"></script>




        @livewireScripts()
    </section>
</body>




</html>
