@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-3 ml-auto mb-2 text-right">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="pr-2">
                                        <h5 class="card-title">Total Pending Payment</h5>
                                        <div class="d-flex align-items-center">
                                            <h2 class="mb-0" style="font-size: 24px;">Rs:{{ $totalPayment }}</h2>
                                        </div>
                                        @if ($totalPayment > 0)
                                            <form
                                                action="{{ route('admin.store.pay.pending.payments', ['id' => $storeId]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-credit-card text-success icon-md"></i>
                                                    Pay Store Payments
                                                </button>
                                            </form>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>Order Id#</th>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Shipping Total</th>
                                            <th>Product Total</th>
                                            <th>Total Payment</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($storeProductPayments as $productPayment)
                                            <tr>
                                                <td>{{ $productPayment->id }} </td>
                                                <th>{{ $productPayment->product_name }}</th>
                                                <th>{{ $productPayment->product_quantity }}</th>
                                                <th>{{ $productPayment->shipping_total }}</th>
                                                <th>{{ $productPayment->product_total }}</th>
                                                <th>{{ $productPayment->total_price }}</th>

                                                <td>
                                                    @if ($productPayment->order_status)
                                                        <label class="badge badge-success">Completed</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($productPayment->store_paid_status)
                                                        <label class="badge badge-success">Paid</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td>


                                                {{-- <td>
                                                    @if ($store->payment_status)
                                                        <label class="badge badge-success">Paid</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td> --}}

                                                {{-- <td>{{ $store->created_at->diffForHumans() }}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('admin.store.orders.payments', ['id' => $store->seller_id]) }}">
                                                            <i class="fa fa-eye text-primary"></i></a>
                                                    </button>

                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
