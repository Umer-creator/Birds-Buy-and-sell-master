@extends('layouts.admin')
@section('admin')
{{--    <script src="{{ asset('user/js/ckeditor/ckeditor.js') }}"></script>--}}

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Management</h4>
                <p class="card-description">
                    Add Category
                </p>
                <form class="forms-sample" method="post" action="{{ route('category.add') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name"
                                   placeholder="Name">
                        </div>
                        <div class="col-sm-4">
                            <label for="slug">Slug</label>
                            <input type="text" value="{{ old('slug') }}" class="form-control" name="slug"
                                   placeholder="Slug">
                        </div>
                        <div class="col-sm-4">
                            <label for="popular">Popular</label>
                            <select class="form-control" name="popular">
                                <option value="0">no</option>
                                <option value="1">yes</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="description">Description</label>
                        {{-- <input type="text" value="{{ old('description') }}" class="form-control" name="description"
                            placeholder=""> --}}
                        <textarea id="description" value="{{ old('description') }}" class="form-control " name="description"></textarea>

                        {{-- <script>
                            CKEDITOR.replace('description');
                        </script> --}}
                    </div>





                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="file-upload-default" onchange="preview_image(event)"
                            value="{{ old('image') }}">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled=""
                                placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
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
                        <div class="alert alert-success" id="message">
                            {{ session('success') }}
                        </div>
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

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" >Cancel</button>
                </form>
            </div>
        </div>
    </div>



@endsection
