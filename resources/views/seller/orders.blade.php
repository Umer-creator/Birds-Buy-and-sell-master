@extends('layouts.seller')
@section('seller')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>ID #</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Shipping amount</th>
                                            <th>Payment status</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 40; $i++)
                                            <tr>
                                                <td> {{ $i }} </td>
                                                <td>Shayan</td>
                                                <td>{{ $i }}000</td>
                                                <td>{{ $i }}50</td>
                                                <td>
                                                    <label class="badge badge-success">Completed</label>
                                                </td>
                                                <td>
                                                    <label class="badge badge-warning">Pending</label>
                                                </td>
                                                <td>2022/11/27</td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <i class="fa fa-eye text-primary"></i>View
                                                    </button>

                                                </td>
                                            </tr>
                                        @endfor

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
