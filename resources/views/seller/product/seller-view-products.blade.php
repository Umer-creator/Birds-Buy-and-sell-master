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
                                            <th>No</th>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <td class="py-1">
                                                    <img src="{{ asset($product->image) }}" alt="image">
                                                </td>

                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>
                                                    @if ($product->status)
                                                        <label class="badge badge-success">Approved</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td>

                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('seller.product.detail', ['id' => $product->id]) }}"><i
                                                                class="fa fa-eye text-success">
                                                            </i></a>
                                                    </button>
                                                </td>

                                                <td>
                                                    <button class="btn btn-light">

                                                        <a
                                                            href="{{ route('seller.product.edit', ['id' => $product->id]) }}"><i
                                                                class="fa fa-pen text-success">
                                                            </i></a>
                                                    </button>
                                                </td>

                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('seller.product.delete', ['id' => $product->id]) }}"><i
                                                                class="fa fa-times text-danger">
                                                            </i></a>
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
