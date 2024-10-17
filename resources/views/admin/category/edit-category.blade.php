@extends('layouts.admin')
@section('admin')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Management</h4>
                <p class="card-description">
                    Edit Category
                </p>
                <form class="forms-sample" method="post" action="{{ route('category.update', ['id' => $category->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name"
                            placeholder="Name" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug"
                            placeholder="Slug">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" value="{{ $category->description }}" class="form-control" name="description"
                            placeholder="">
                    </div>


                    <div class="form-group">
                        <label for="popular">Popular</label>
                        <select class="form-control" name="popular">
                            @if ($category->popular == '1')
                                <option value="0">no</option>
                                <option selected value="1">yes</option>
                            @else
                                <option selected value="0">no</option>
                                <option value="1">yes</option>
                            @endif

                        </select>
                    </div>


                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="file-upload-default" onchange="preview_image(event)"
                            value="{{ $category->image }}">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled=""
                                value="{{ $category->image }}" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <td><img src="{{ asset($category->image) }}" class="w-50" alt=""></td>
                    </div>

                    <div class="form-group">
                        <label align="center">Your selected File:</label><br>
                        <img src="" id="output_image" height="200px" required>
                    </div>
                    <script type='text/javascript'>
                        function preview_image(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                var output = document.getElementById('output_image');
                                output.src = reader.result;
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>

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
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Category updated successfully',
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




                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" onclick="event.preventDefault(); window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
