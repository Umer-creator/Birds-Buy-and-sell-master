@extends('layouts.seller')
@section('seller')
    {{--    <script src="{{ asset('user/js/ckeditor/ckeditor.js') }}"></script> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="cmxform" id="crud" method="post" action="{{ route('seller.product.add') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="name">Product name</label>
                                    <input id="name" value="{{ old('name') }}" class="form-control form-control-sm"
                                        name="name" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label for="slug">slug</label>
                                    <input id="slug" value="{{ old('slug') }}" class="form-control form-control-sm"
                                        name="slug" type="text">
                                </div>
                                <div class="col-sm-6">
                                    <label for="short_des">Short description</label>
                                    <input id="short_des" value="{{ old('short_des') }}"
                                        class="form-control form-control-sm" name="short_des" type="text">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                {{-- <input id="description" value="{{ old('description') }}" class="form-control form-control-sm"
                                    name="description" type="text"> --}}
                                <textarea id="description" value="{{ old('description') }}" class="form-control form-control-sm " name="description"></textarea>
                                {{-- <script>
                                    CKEDITOR.replace('description');
                                </script> --}}
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="price">Price</label>
                                    <input id="price" value="{{ old('price') }}" class="form-control form-control-sm"
                                        name="price" type="number">
                                </div>
                                <div class="col-sm-2">
                                    <label for="quantity">Quantity</label>
                                    <input id="quantity" value="{{ old('quantity') }}" class="form-control form-control-sm"
                                        name="quantity" type="number">
                                </div>


                                <div class="col-sm-3">
                                    <label for="category">Category</label>
                                    <select class="form-control form-control-sm" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="store">Store</label>
                                    <select class="form-control form-control-sm" name="store">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" id="image" name="image" class="file-upload-default"
                                    id="image" value="">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control  form-control-sm file-upload-info"
                                        disabled="" placeholder="Upload profile Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload multiple images:</label>
                                <input type="file" id="images" class="form-control" name="images[]" multiple>

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
                                        title: 'Product created successfully',
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
