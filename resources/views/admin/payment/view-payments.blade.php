@extends('layouts.admin')
@section('admin')
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
                                            <th>No#</th>
                                            <th>Store Name</th>
                                            <th>Completed Order</th>
                                            <th>Pending payment</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($stores as $store)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <th>{{ $store->name }}</th>
                                                <td>{{ $store->countTotalCompleteOrders($store->id) }}</td>
                                                <td>{{ $store->calculateStoreTotalPayment($store->id) }}</td>

                                                {{-- <td>
                                                    @if ($store->payment_status)
                                                        <label class="badge badge-success">Paid</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td> --}}

                                                <td>{{ $store->created_at->diffForHumans() }}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('admin.store.orders.payments', ['id' => $store->id]) }}">
                                                            <i class="fa fa-eye text-primary"></i></a>
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
