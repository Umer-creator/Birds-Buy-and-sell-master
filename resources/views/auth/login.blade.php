@extends('layouts.auth')

@section('auth')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <h4>Welcome to Login!</h4>
                            <h6 class="font-weight-light">Birds Buy and Sell!</h6>
                            <form class="cmxform" id="signupForm" method="POST" action="{{ route('login') }}">
                                @csrf


                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <fieldset>
                                    <div class="form-group">
                                        <div class=" bg-transparent">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="form-control" type="email"
                                                placeholder="Email" name="email" :value="old('email')" required autofocus />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class=" bg-transparent">
                                            <x-jet-label for="Password" value="{{ __('Password') }}" />
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                                class="form-control" name="password" required placeholder="Password"
                                                autocomplete="current-password" />
                                        </div>
                                    </div>
                                    <x-jet-validation-errors class="mb-4 text-danger" />

                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input">
                                                Keep me signed in
                                            </label>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot
                                                password?</a>
                                        @endif
                                    </div>
                                    <div class="my-3">
                                        <x-jet-button id="login"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                            {{ __('Log in') }}
                                        </x-jet-button>
                                    </div>
                                </fieldset>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a id="account_register" href="{{ route('register') }}"
                                        class="text-primary">Register</a>
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
