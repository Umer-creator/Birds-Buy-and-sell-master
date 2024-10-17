@extends('layouts.seller')

@section('seller')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>Order no</th>
                                            <th>Product name</th>
                                            <th>Product total</th>
                                            <th>Shipping total</th>
                                            <th>Total Price</th>
                                            <th>Payment status</th>
                                            <th>Shipping status</th>
                                            <th>Order status</th>
                                            <th>Order date</th>
                                            <th>View order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <td>{{ $order->product_name }}</td>
                                                <td>{{ $order->product_total }}</td>
                                                <td>{{ $order->shipping_total }}</td>
                                                <td>{{ $order->total_price }}</td>

                                                <td>
                                                    @if ($order->payment_status)
                                                        <label class="badge badge-success">Paid</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->shipping_status)
                                                        <label class="badge badge-success">Deliverd</label>
                                                    @else
                                                        <label class="badge badge-warning">panding</label>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($order->order_status)
                                                        <label class="badge badge-success">Complite</label>
                                                    @else
                                                        <label class="badge badge-warning">Processing</label>
                                                    @endif
                                                </td>
                                                <td>{{ $order->created_at->diffForHumans() }}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a href="{{ route('seller.view.order', ['id' => $order->id]) }}"> <i
                                                                class="fa fa-eye text-primary"></i></a>
                                                    </button>

                                                </td>
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
