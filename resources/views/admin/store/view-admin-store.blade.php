@extends('layouts.admin')
@section('admin')
    @foreach ($storee as $store)
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Store Detail
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Store</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Store details</li>
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
                                        <img src={{ asset($store->image) }} alt="profile"
                                            class="img-lg rounded-circle mb-3" />

                                        <div>
                                            <label class="badge badge-outline-dark">{{ $store->name }}</label>
                                        </div>

                                    </div>


                                    <div class="py-4">

                                        <p class="clearfix">
                                            <span class="float-left">Name</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->name }}</span>
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">Slug</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->slug }}</span>
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">Description</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->description }}</span>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">Email</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->email }}</span>
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">Phone</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->phone }}</span>
                                            </span>
                                        </p>


                                        <p class="clearfix">
                                            <span class="float-left">Created at</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->created_at }}</span>
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">Store Address</span>
                                            <span class="float-right text-muted ">
                                                <span class="text-success"> {{ $store->address }}</span>
                                            </span>
                                        </p>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
