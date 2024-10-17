@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>

                    <div class="row">
                        <div class="col-10">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>Id</th>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Popular</th>
                                            <th>Actions</th>
                                            <th>Browse</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $i++ }} </td>
                                                <td class="py-1">
                                                    {{-- <img src="{{ asset('user/images/faces/face1.jpg') }}" alt="image"> --}}
                                                    <img src="{{ asset($category->image) }}">
                                                </td>

                                                <td>{{ $category->name }}</td>


                                                <td>{{ $category->created_at->diffForHumans() }}</td>

                                                <td>
                                                    @if ($category->popular)
                                                        <label class="badge badge-success">Yes</label>
                                                    @else
                                                        <label class="badge badge-warning">No</label>
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <button class="btn btn-light">
                                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}"><i
                                                                class="fa fa-eye text-primary">
                                                            </i></a>
                                                    </button>



                                                    <button class="btn btn-light" data-toggle="modal"
                                                        data-target="#alertModal">
                                                        {{-- href="{{ route('category.delete', ['id' => $category->id]) }}" --}}
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
                                                                    <p>This action will delete this category and products
                                                                        associated with this category</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                                                            style="color: white;">Confirm</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end  Alert Modal -->
                                                </td>
                                                <td>



                                                    <a target="{{ route('frontend.view-category', ['slug' => $category->slug]) }}"
                                                        href="{{ route('frontend.view-category', ['slug' => $category->slug]) }}"><i
                                                            class="fa fa-eye text-success">
                                                        </i></a>


                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (session('success'))
                                            <script>
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Category Deleted successfully',
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
