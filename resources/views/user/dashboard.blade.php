@extends('layouts.user')

@section('user')
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card text-center">
            <div class="card-body">

                @auth
                    <img src={{ asset(Auth::user()->profile_photo_path) }} class="img-lg rounded-circle mb-2" alt="profile image">
                @endauth
                @if (Route::has('login'))
                    @auth
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted">Buyer</p>
                    @endauth
                @endif
                {{-- <h4>Shayan</h4>
                <p class="text-muted">Buyer</p>
                <p class="mt-4 card-text">
                    Abbottabad Kpk
                </p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Order</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">{{ Auth::user()->order->count() }}</h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                <i class="far fa-clock text-muted"></i>
                                <small class="ml-1 mb-0">Updated</small>
                            </div>
                        </div>
                        <small class="text-gray">currrent processing order</small>
                    </div>
                    <div class="d-inline-block">
                        <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
