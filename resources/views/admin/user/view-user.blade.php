@extends('layouts.admin')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                User Detail
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User details</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 m-5">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ asset('user/images/faces/face1.jpg') }}" alt="profile"
                                        class="img-lg rounded-circle mb-3" />

                                    <div>
                                        <label class="badge badge-outline-dark">{{ $user->name }}</label>
                                    </div>

                                </div>


                                <div class="py-4">

                                    <p class="clearfix">
                                        <span class="float-left">Name</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $user->name }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Email</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $user->email }}</span>
                                        </span>
                                    </p>


                                    <p class="clearfix">
                                        <span class="float-left">Created at</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $user->created_at }}</span>
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">User Role</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $user->utype }}</span>
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">Seller Status</span>
                                        <span class="float-right text-muted ">
                                            @if ($user->seller_status)
                                                <span class="text-success">Seller</span>
                                            @else
                                                <span class="text-success">only customer</span>
                                            @endif
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
