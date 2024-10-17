@extends('layouts.auth')

@section('auth')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <h4>Wellcome & Register here!</h4>
                            <h6 class="font-weight-light">Birds Buy and Sell!</h6>

                            <form class="cmxform" id="signupForm" method="POST" action="{{ route('register') }}">
                                @csrf

                                <fieldset>
                                    <div class="form-group">
                                        <div class=" bg-transparent">
                                            {{-- <input id="username" class="form-control" placeholder="Full Name"
                                                name="name" type="text"> --}}
                                            <x-jet-label for="name" value="{{ __('Name') }}" />
                                            <x-jet-input id="name" class="form-control" type="text"
                                                placeholder="Full Name" name="name" :value="old('name')" required autofocus
                                                autocomplete="name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" bg-transparent">
                                            {{-- 
                                            <input id="email" class="form-control" placeholder="Email" name="email"
                                                type="email"> --}}
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="form-control" type="email" name="email"
                                                placeholder="Email" :value="old('email')" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class=" bg-transparent">
                                            {{-- <input id="password" placeholder="Password" class="form-control"
                                                name="password" type="password"> --}}
                                            <x-jet-label for="password" value="{{ __('Password') }}" />
                                            <x-jet-input id="password" placeholder="Password" class="form-control"
                                                type="password" name="password" required autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" bg-transparent">

                                            {{-- <input id="confirm_password" placeholder="Confirm Password" class="form-control"
                                                name="confirm_password" type="password"> --}}
                                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-jet-input id="password_confirmation" class="form-control" type="password"
                                                placeholder="Confirm Password" name="password_confirmation" required
                                                autocomplete="new-password" />
                                        </div>
                                    </div>

                                    <x-jet-validation-errors class="mb-4 text-danger" />

                                    <div class="my-3">
                                        <input id="register"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn "
                                            type="submit" value="Register">
                                    </div>
                                </fieldset>
                                @if (session('message'))
                                    <div class="alert alert-success" id="message">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <script>
                                    setTimeout(function() {
                                        document.getElementById("message").style.display = "none";
                                    }, 3000);
                                </script>

                                <div class="text-center mt-4 font-weight-light">
                                    Do you have an account? <a href="  {{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2022
                            Birds Buy and Sell.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
@endsection
