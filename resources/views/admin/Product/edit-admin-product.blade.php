@extends('layouts.admin')

@section('admin')
    {{--    <script src="{{ asset('user/js/ckeditor/ckeditor.js') }}"></script> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <form class="cmxform" id="crud" method="post"
                        action="{{ route('admin.product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="name">Product name</label>
                                    <input id="name" value="{{ old('name', $product->name) }}"
                                        class="form-control form-control-sm" name="name" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label for="slug">Slug</label>
                                    <input id="slug" value="{{ old('slug', $product->slug) }}"
                                        class="form-control form-control-sm" name="slug" type="text">
                                </div>
                                <div class="col-sm-6">
                                    <label for="short_des">Short description</label>
                                    <input id="short_des" value="{{ old('short_des', $product->short_des) }}"
                                        class="form-control form-control-sm" name="short_des" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control form-control-sm" name="description">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="price">Price</label>
                                    <input id="price" value="{{ old('price', $product->price) }}"
                                        class="form-control form-control-sm" name="price" type="number">
                                </div>
                                <div class="col-sm-2">
                                    <label for="quantity">Quantity</label>
                                    <input id="quantity" value="{{ old('quantity', $product->quantity) }}"
                                        class="form-control form-control-sm" name="quantity" type="number">
                                </div>
                                <div class="col-sm-3">
                                    <label for="category">Category</label>
                                    <select class="form-control form-control-sm" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="store">Store</label>
                                    <select class="form-control form-control-sm" name="store">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                {{ old('store', $product->store_id) == $store->id ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>File upload</label>

                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info"
                                        value="{{ $product->image }}" placeholder="Upload Image">

                                </div>
                            </div>
                            <label for="">Existing Image</label>
                            <div class="form-group">

                                <td><img class="image-fluid " style="height: 20%;width:20%"
                                        src="{{ asset($product->image) }}" class="w-50" alt=""></td>
                            </div>

                            <div class="form-group">
                                <label for="images">Upload multiple images:</label>
                                <input value={{ $product->images }} type="file" id="images" class="form-control"
                                    name="images[]" multiple>
                            </div>

                            <label for="">Existing Images</label>
                            <div class="card-body">
                                <div class="row">
                                    @php
                                        $images = json_decode($product->images, true);
                                    @endphp

                                    @foreach ($images as $image)
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                            <div class="banner banner-cat">
                                                <img style="height:150px; width:150px" src="{{ asset($image) }}"
                                                    alt="profile" class="img-fluid" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>



                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success" id="message">
                                    {{ session('success') }}
                                </div>

                                <script>
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Product updated successfully',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                </script>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <script>
                                setTimeout(function() {
                                    document.getElementById("message").style.display = "none";
                                }, 10000);
                            </script>

                            <input class="btn btn-primary" type="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
