@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">

                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Store</th>
                                            <th>Seller</th>
                                            @if (Request::is('admin-approved-stores'))
                                                <th>Products</th>
                                                <th>Status</th>
                                            @endif
                                            <th>Created At</th>
                                            <th>Delete</th>
                                            <th>View</th>
                                            @if (Request::is('admin-approved-stores'))
                                                <th>Browse</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($stores as $store)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <td class="py-1">
                                                    <img src="{{ asset($store->image) }}" alt="image">
                                                </td>

                                                <td>{{ $store->name }}</td>
                                                <td>{{ $store->user->name }}</td>





                                                @if (Request::is('admin-approved-stores'))
                                                    <td>
                                                        @php
                                                            $count = count($store->product);
                                                            echo $count;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @if ($store->status)
                                                            <label class="badge badge-success badge-pill">Active</label>
                                                        @else
                                                            <label class="badge badge-warning badge-pill">Blocked</label>
                                                        @endif
                                                    </td>
                                                @endif
                                                <td>{{ $store->created_at->diffForHumans() }}</td>


                                                <td class="text-right">
                                                    <button class="btn btn-light" data-toggle="modal"
                                                        data-target="#alertModal">
                                                        <a><i class="fa fa-times text-danger">
                                                            </i></a>

                                                    </button>
                                                </td>
                                                <td>


                                                    <button class="btn btn-light">
                                                        <a
                                                            href="{{ route('admin.seller.store.view', ['id' => $store->id]) }}"><i
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
                                                                        <a href="{{ route('admin.seller.store.delete', ['id' => $store->id]) }}"
                                                                            style="color: white;">Confirm</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end  Alert Modal -->
                                                </td>

                                                @if (Request::is('admin-approved-stores'))
                                                    <td>
                                                        <button class="btn btn-light">

                                                            <a target="{{ route('frontend.storeDetail', ['slug' => $store->slug]) }}"
                                                                href="{{ route('frontend.storeDetail', ['slug' => $store->slug]) }}"><i
                                                                    class="fa fa-hospital text-success">
                                                                </i></a>
                                                        </button>
                                                    </td>
                                                @endif
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
