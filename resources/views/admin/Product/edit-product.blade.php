@extends('layouts.admin')
@section('admin')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Product Detail
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product details</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ asset($product->image) }}" alt="profile"
                                        class="img-fluid rounded-sm shadow mb-3" />

                                    <p class="h5">Product</p>
                                    <div>
                                        <label class="badge badge-outline-dark">{{ $product->name }}</label>
                                    </div>

                                    <p class="h5">Store</p>
                                    <div>
                                        <a target="{{ route('frontend.storeDetail', ['slug' => $product->store->slug]) }}"
                                            href="{{ route('frontend.storeDetail', ['slug' => $product->store->slug]) }}"><label
                                                class="badge badge-outline-dark">{{ $product->store->name }}</label>
                                        </a>

                                    </div>

                                </div>


                                <div class="py-4">

                                    <p class="clearfix">
                                        <span class="float-left">Store</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $product->store->name }}</span>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">Category</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $product->category->name }}</span>
                                        </span>
                                    </p>


                                    <p class="clearfix">
                                        <span class="float-left">Price</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $product->price }}</span>
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">Quantity</span>
                                        <span class="float-right text-muted ">
                                            <span class="text-success"> {{ $product->quantity }}</span>
                                        </span>
                                    </p>


                                    <p class="clearfix">
                                        <span class="float-left">Stock status</span>
                                        <span class="float-right text-muted ">
                                            @if ($product->stock_status)
                                                <span class="text-success">In Stock</span>
                                            @else
                                                <span class="text-danger">Out of Stock</span>
                                            @endif
                                        </span>
                                    </p>

                                    <input type="hidden" class="product_id" value={{ $product->id }}>
                                    <label for="">Approved Status</label>
                                    <select class="form-control status" name="status">
                                        @if ($product->status)
                                            <option value="1" selected>Approved</option>
                                            <option value="0">Pending</option>
                                        @else
                                            <option value="0" selected>Pending</option>
                                            <option value="1">Approved</option>
                                        @endif
                                    </select>



                                    <label class="">Featured</label>
                                    <select class="form-control featured" name="featured">
                                        @if ($product->featured)
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        @endif
                                    </select>
                                </div>
                                <button class="btn btn-success btn-block editProduct">Save</button>

                                <script>
                                    $(document).ready(function() {
                                        $(".editProduct").click(function(e) {
                                            e.preventDefault();

                                            var product_id = $(".product_id").val();
                                            var status = $(".status").val();
                                            var featured = $(".featured").val();

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });

                                            $.ajax({
                                                method: "POST",
                                                url: "/update-product",
                                                data: {
                                                    "product_id": product_id,
                                                    "featured": featured,
                                                    "status": status,
                                                },
                                                success: function(response) {
                                                    alert(response.status);
                                                }
                                            });


                                        });
                                    });
                                </script>
                            </div>
                            <div class="col-lg-9 pl-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <p class="card-description">{{ $product->slug }}</p>
                                        <div class="mt-4">
                                            <div class="accordion" id="accordion" role="tablist">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-1">
                                                        <h6 class="mb-0">
                                                            <a data-toggle="collapse" href="#collapse-1"
                                                                aria-expanded="true" aria-controls="collapse-1">
                                                                Short Description
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-1" class="collapse show" role="tabpanel"
                                                        aria-labelledby="heading-1" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    {{ $product->short_des }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-2">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" href="#collapse-2"
                                                                aria-expanded="false" aria-controls="collapse-2">
                                                                Detail Description
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-2" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-2" data-parent="#accordion">
                                                        <div class="card-body">
                                                            {{ $product->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-4">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                href="#collapse-4" aria-expanded="false"
                                                                aria-controls="collapse-4">
                                                                Product Images
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-4" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-4" data-parent="#accordion">
                                                        <div class="card-body">
                                                            @php
                                                                $images = json_decode($product->images, true);
                                                            @endphp

                                                            @foreach ($images as $image)
                                                                <div class="banner banner-cat ml-10">
                                                                    <img style="height:250px; width:300px"
                                                                        src="{{ asset($image) }}" alt="profile"
                                                                        class="img-lg  mb-3" />
                                                                </div>
                                                            @endforeach



                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="heading-3">
                                                        <h6 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                                href="#collapse-3" aria-expanded="false"
                                                                aria-controls="collapse-3">
                                                                Creation Data
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapse-3" class="collapse" role="tabpanel"
                                                        aria-labelledby="heading-3" data-parent="#accordion">
                                                        <div class="card-body">
                                                            {{ $product->created_at }}

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
