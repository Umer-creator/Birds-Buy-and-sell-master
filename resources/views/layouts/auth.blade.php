<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Auth</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('user/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href=" {{ asset('user/vendors/css/vendor.bundle.addons.css') }}">
    {{-- start page header  --}}
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <!-- endinject -->

    <link rel="shortcut icon" href="{{ asset('user/images/favicon') }}" />
</head>

<body>
    @yield('auth')
</body>


<script src="{{ asset('user/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('user/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- inject:js -->
<script src="{{ asset('user/js/off-canvas.js') }}"></script>
<script src="{{ asset('user/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('user/js/misc.js') }}"></script>
<script src="{{ asset('user/js/settings.js') }}"></script>
<script src="{{ asset('user/js/todolist.js') }}"></script>

{{-- form validation js file --}}

<script src="{{ asset('user/js/form-validation.js') }}"></script>
<script src="{{ asset('user/js/bt-maxLength.js') }}"></script>
