@extends('layouts.user')
@section('user')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Order Detail
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order details</li>
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
                                    {{-- <img src="{{ asset('user/images/faces/face1.jpg') }}" alt="profile"
                                        class="img-lg rounded-circle mb-3" /> --}}
                                    <p class="h5">Order</p>
                                    <div>
                                        <label class="badge badge-outline-dark">{{ $order->product_name }}</label>
                                    </div>

                                </div>

                                <div class="py-4">

                                    <p class="clearfix">
                                        <span class="float-left">Store</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $order->store_name }}</span>
                                        </span>
                                    </p>


                                    <p class="clearfix">
                                        <span class="float-left">Total Price</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $order->total_price }}</span>
                                        </span>
                                    </p>


                                    <p class="clearfix">
                                        <span class="float-left">Quantity</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $order->product_quantity }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Shipping Address</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $order->shipping_address }}</span>
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">Payment status</span>
                                        <span class="float-right text-muted ">
                                            @if ($order->payment_status)
                                                <span class="text-success">Paid</span>
                                            @else
                                                <span class="text-danger">Pending</span>
                                            @endif
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">Shipping status</span>
                                        <span class="float-right text-muted ">
                                            @if ($order->shipping_status)
                                                <span class="text-success">Deliverd</span>
                                            @else
                                                <span class="text-danger">Pending</span>
                                            @endif
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Order status</span>
                                        <span class="float-right text-muted ">
                                            @if ($order->order_status)
                                                <span class="text-success">Complete</span>
                                            @else
                                                <span class="text-danger">Processing</span>
                                            @endif
                                        </span>
                                    </p>


                                    @if ($order->shipping_status)
                                        @if (!$order->order_status)
                                            <form class="cmxform" method="post"
                                                action="{{ route('user.confirm.order.shipping') }}">
                                                @csrf

                                                <input type="hidden" name="order_id" value={{ $order->id }}>
                                                <label class="">Shipping confirmation</label>
                                                <p>please confirm the shipping confirmation to complete the order process
                                                </p>
                                                <select class="form-control status" name="shipping_confirmation" required>
                                                    <option disabled selected>Select Option</option>
                                                    <option value="1">Product received</option>
                                                    <option value="0">Product not received</option>

                                                </select>
                                                <button type="submit" class="btn btn-success mt-2 btn-block">Save</button>
                                            </form>
                                        @endif
                                    @endif



                                    <input type="hidden" class="order_id" value={{ $order->id }}>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $(".editProduct").click(function(e) {
                                            e.preventDefault();

                                            var product_id = $(".product_id").val();
                                            var status = $(".status").val();
                                            var featured = $(".featured").val();

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });

                                            $.ajax({
                                                method: "POST",
                                                url: "/update-product",
                                                data: {
                                                    "product_id": product_id,
                                                    "featured": featured,
                                                    "status": status,
                                                },
                                                success: function(response) {
                                                    alert(response.status);
                                                }
                                            });


                                        });
                                    });
                                </script>
                            </div>
                            <div class="col-lg-9 pl-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $order->product_name }}</h4>
                                        <p class="card-description">{{ $order->created_at }}</p>
                                        <div class="mt-4">
                                            <div class="accordion" id="accordion" role="tablist">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-1">
                                                        <h6 class="mb-0">
                                                            <a data-toggle="collapse" href="#collapse-1"
                                                                aria-expanded="true" aria-controls="collapse-1">
                                                                Product Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-1" class="collapse show" role="tabpanel"
                                                        aria-labelledby="heading-1" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <span class="text-info">Product name</span>
                                                                    <p>{{ $order->product_name }}</p>
                                                                    <span class="text-info">Store name</span>
                                                                    <p>{{ $order->store_name }}</p>
                                                                    <span class="text-info">Quantity</span>
                                                                    <p>{{ $order->product_quantity }}</p>
                                                                    <span class="text-info">Product total</span>
                                                                    <p>{{ $order->product_total }}</p>
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
                                                                Shipping Details
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-2" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-2" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <span class="text-info">Shipping Address</span>
                                                            <p>{{ $order->shipping_address }}</p>
                                                            <span class="text-info">Distance from store to You
                                                                Address</span>
                                                            <p>{{ $order->distance }} km</p>
                                                            <span class="text-info">Shipping charges per km</span>
                                                            <p>Rs: {{ $order->shipping_charg_perkm }} </p>

                                                            <span class="text-info">Shipping Total</span>
                                                            <p>{{ $order->shipping_total }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-4">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                href="#collapse-4" aria-expanded="false"
                                                                aria-controls="collapse-4">
                                                                Order Processing
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-4" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-4" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <span class="text-info form-control">Payment status</span>
                                                                @if ($order->payment_status)
                                                                    <label class="badge badge-success mt-2">Paid</label>
                                                                @else
                                                                    <label class="badge badge-warning mt-2">Pending</label>
                                                                @endif
                                                                <span class="text-info form-control">Shipping status</span>
                                                                @if ($order->shipping_status)
                                                                    <label
                                                                        class="badge badge-success mt-2">Deliverd</label>
                                                                @else
                                                                    <label class="badge badge-warning mt-2">Pending</label>
                                                                @endif
                                                                <span class="text-info form-control">Order status</span>
                                                                @if ($order->order_status)
                                                                    <label
                                                                        class="badge badge-success mt-2">Complete</label>
                                                                @else
                                                                    <label
                                                                        class="badge badge-warning mt-2">Processing</label>
                                                                @endif
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
                                                            <p class="text-info"> {{ $order->created_at }}</p>
                                                            <p class="text-info">{{ $order->created_at->diffForHumans() }}
                                                            </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
