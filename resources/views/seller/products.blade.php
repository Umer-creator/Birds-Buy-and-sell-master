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
                                            <th>No</th>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i < 30; $i++)
                                            <tr>
                                                <td>{{ $i }} </td>
                                                <td class="py-1">
                                                    <img src="{{ asset('user/images/faces/face1.jpg') }}" alt="image">
                                                </td>

                                                <td>Pakistani Bird</td>
                                                <td>{{ $i }}000</td>
                                                <td>{{ $i }}</td>
                                                <td>12-04-2022</td>

                                                <td>
                                                    <label class="badge badge-success">Published</label>
                                                </td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <i class="fa fa-eye text-primary"></i>View
                                                    </button>
                                                    <button class="btn btn-light">
                                                        <i class="fa fa-times text-danger"></i>Remove
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
