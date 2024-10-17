@extends('layouts.admin')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Product Detail
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
                            <div class="col-lg-3">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ asset($store->image) }}" alt="profile" class="img-fluid  mb-3" />
                                    <p class="h5">Store</p>
                                    <div>
                                        <label class="badge badge-outline-dark">{{ $store->name }}</label>
                                    </div>

                                </div>


                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">Store Name</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $store->name }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Store Seller </span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $store->user->name }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Store Seller Email </span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $store->user->email }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Store Location</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $store->address }}</span>
                                        </span>
                                    </p>






                                    <p class="clearfix">
                                        <span class="float-left">Approved Status</span>
                                        <span class="float-right text-muted ">
                                            @if ($store->approved)
                                                <span class="text-success">Approved</span>
                                            @else
                                                <span class="text-danger">Not Approved</span>
                                            @endif
                                        </span>
                                    </p>

                                    @if (!$store->approved)
                                        <form class="cmxform" method="post"
                                            action="{{ route('admin.approve.seller.store') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value={{ $store->user->id }}>
                                            <input type="hidden" name="store_id" value={{ $store->id }}>
                                            <label class="">Approve/disapprove Seller Store</label>
                                            <select class="form-control status" name="status" required>
                                                <option disabled selected>Select Option</option>
                                                <option value="1">Approved</option>
                                                <option value="0">disapproved</option>
                                            </select>
                                            <button type="submit" class="btn btn-success mt-2 btn-block">Save</button>
                                        </form>
                                    @endif

                                </div>




                            </div>
                            <div class="col-lg-9 pl-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $store->name }}</h4>
                                        <p class="card-description">{{ $store->slug }}</p>
                                        <div class="mt-4">
                                            <div class="accordion" id="accordion" role="tablist">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-1">
                                                        <h6 class="mb-0">
                                                            <a data-toggle="collapse" href="#collapse-1"
                                                                aria-expanded="true" aria-controls="collapse-1">
                                                                Description
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-1" class="collapse show" role="tabpanel"
                                                        aria-labelledby="heading-1" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    {{ $store->description }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-2">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapse-2"
                                                                aria-expanded="false" aria-controls="collapse-2">
                                                                Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-2" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-2" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <b>
                                                                <p>Store Slug</p>
                                                            </b>
                                                            <p class="text-success">{{ $store->slug }}</p>
                                                            <b>
                                                                <p>Store Phone</p>
                                                            </b>
                                                            <p class="text-success">{{ $store->phone }}</p>
                                                            <b>
                                                                <p>Store Email </p>
                                                            </b>
                                                            <p class="text-success">{{ $store->email }}</p>
                                                            <b>
                                                                <p>Store City</p>
                                                            </b>
                                                            <p class="text-success">{{ $store->city }}</p>
                                                            <b>
                                                                <p>Store Address</p>
                                                            </b>
                                                            <p class="text-success">{{ $store->address }}</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-6">
                                                        <h6 class="mb-0">
                                                            <a data-toggle="collapse" href="#collapse-6"
                                                                aria-expanded="true" aria-controls="collapse-6">
                                                                Payment Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-6" class="collapse show" role="tabpanel"
                                                        aria-labelledby="heading-6" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <p>Stripe Secret Key</p>
                                                                    <p class="text-success">
                                                                        {{ $store->stripeSecretKey }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-3">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                href="#collapse-3" aria-expanded="false"
                                                                aria-controls="collapse-3">
                                                                Creation Data
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-3" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-3" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p class="text-success">

                                                                {{ $store->created_at }}
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                                @if (session('success'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Store Approves successfully',
                                            showConfirmButton: false,
                                            timer: 1000,
                                            customClass: {
                                                popup: 'small-alert',
                                                title: 'small-alert-title'
                                            }
                                        });
                                    </script>

                                    <style>
                                        .small-alert {
                                            width: 270px;
                                            height: 120px;
                                        }

                                        .small-alert-title {
                                            font-size: 18px;
                                        }
                                    </style>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
