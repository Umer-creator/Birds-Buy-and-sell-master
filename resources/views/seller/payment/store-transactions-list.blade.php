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
                                            <th>Transaction ID</th>
                                            <th>Store Name</th>
                                            <th>Total Orders</th>
                                            <th>Total Amount</th>
                                            <th>Transaction Time</th>
                                            <th>View</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->store->name }}</td>
                                                <td>{{ $transaction->total_orders }}</td>
                                                <td>{{ $transaction->total_amount }}</td>


                                                <td>{{ $transaction->created_at->diffForHumans() }}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('seller.store.transaction.view', ['transactionId' => $transaction->id]) }}">
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
