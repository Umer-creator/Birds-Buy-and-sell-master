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
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Is Seller</th>
                                            <th>Created At</th>
                                            <th>Delete</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <td class="py-1">
                                                    @if ($user->image)
                                                        <img src="{{ asset($user->image) }}" alt="image">
                                                    @else
                                                        <p>No DP</p>
                                                    @endif
                                                </td>

                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->utype }}</td>
                                                @if ($user->seller_status)
                                                    <td>Yes</td>
                                                @else
                                                    <td>No</td>
                                                @endif
                                                <td>{{ $user->created_at->diffForHumans() }}</td>

                                                <td class="text-right">


                                                    <button class="btn btn-light" data-toggle="modal"
                                                        data-target="#alertModal">
                                                        <a><i class="fa fa-times text-danger">
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
                                                                        <a
                                                                            href="{{ route('admin.user.delete', ['id' => $user->id]) }}"><i
                                                                                class="fa fa-times text-danger"
                                                                                style="color: white;">Confirm</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end  Alert Modal -->



                                                </td>
                                                <td>
                                                    <button class="btn btn-light">

                                                        <a href="{{ route('admin.user.view', ['id' => $user->id]) }}"><i
                                                                class="fa fa-eye text-view">
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
