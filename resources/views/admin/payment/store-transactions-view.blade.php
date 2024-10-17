@extends('layouts.admin')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Orders Payment Transaction
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaction Detail</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-2">
                    <div class="card-body">
                        <div class="container-fluid">
                            <h3 class="text-right my-5">Transaction&nbsp;&nbsp;{{ $transaction->id }}</h3>
                            <hr>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                                <p class="mt-5"><b>Transaction from</b></p>
                                <p class="mt-2 mb-2"><b>Website Admin</b></p>

                            </div>
                            <div class="col-lg-3 pr-0">
                                <p class="mt-5 mb-2 text-right"><b>Payment sent to Stripe Account:</b>
                                    {{ $transaction->stripeSecretKey }}</p>

                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                                <b>
                                    <p class="mb-0 mt-5">Orders List</p>
                                </b>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">

                                            <th>Order#</th>
                                            <th class="text-right">Product name</th>
                                            <th class="text-right">Product Amount</th>
                                            <th class="text-right">Product Quantity</th>
                                            <th class="text-right">Shipping Amount</th>
                                            <th class="text-right">Total Amount</th>
                                            <th class="text-right">Payment status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordersTransations as $order)
                                            <tr class="text-right">
                                                <td class="text-left">{{ $order->id }}</td>
                                                <td class="text-left">{{ $order->product_name }}</td>
                                                <td>{{ $order->product_quantity }}</td>
                                                <td>{{ $order->product_total }}</td>
                                                <td>{{ $order->shipping_total }}</td>
                                                <td>{{ $order->total_price }}</td>
                                                @if ($order->store_paid_status)
                                                    <td>Paid Successfully</td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2"> Total orders:{{ $transaction->total_orders }}</p>
                            {{-- <p class="text-right">vat (10%) : $138</p> --}}
                            <h4 class="text-right mb-5">Total Amount : Rs:{{ $transaction->total_amount }}</h4>
                            <hr>
                        </div>
                        <div class="container-fluid w-100">
                            <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i
                                    class="fa fa-print mr-1"></i>Print</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
