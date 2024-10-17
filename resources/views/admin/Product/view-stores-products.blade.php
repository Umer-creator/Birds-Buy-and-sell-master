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
                                            <th>Id</th>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Store</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>View</th>
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
                                                <td>{{ $product->store->name }}</td>
                                                <td>
                                                    @if ($product->status)
                                                        <label class="badge badge-success">Approved</label>
                                                    @else
                                                        <label class="badge badge-warning">Pending</label>
                                                    @endif
                                                </td>
                                                <td class="text-right">


                                                    <button class="btn btn-light" data-toggle="modal"
                                                        data-target="#alertModal">
                                                        <a><i class="fa fa-times text-danger">
                                                            </i></a>

                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-light">

                                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"><i
                                                                class="fa fa-eye text-danger">
                                                            </i></a>


                                                    </button>



                                                    <!-- Alert Modal -->
                                                    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog"
                                                        aria-labelledby="alertModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="alertModalLabel">
                                                                        Confirmation</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to proceed?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                                                            style="color: white;">Confirm</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end  Alert Modal -->
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



    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Product Deleted successfully',
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
@endsection
