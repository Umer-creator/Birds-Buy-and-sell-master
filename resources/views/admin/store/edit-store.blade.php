@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Create Store</h4>
                    <form class="cmxform" method="post" action="{{ route('admin.store.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="name">Name</label>
                                    <input id="name" value="{{ old('name') }}" class="form-control form-control-sm"
                                        name="name" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label for="slug">Slug</label>
                                    <input id="slug" value="{{ old('slug') }}" class="form-control form-control-sm"
                                        name="slug" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Phone</label>
                                    <input id="phone" value="{{ old('phone') }}" class="form-control form-control-sm"
                                        name="phone" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Email</label>
                                    <input id="email" value="{{ old('email') }}" class="form-control form-control-sm"
                                        name="email" type="email">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" value="{{ old('description') }}" class="form-control form-control-sm " name="description"></textarea>

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
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="city">City</label>
                                    <input id="city" value="{{ old('city') }}" class="form-control form-control-sm"
                                        name="city" type="text">
                                </div>

                                <div class="col-sm-8">
                                    <label>Address</label>
                                    <input value="{{ old('address') }}" class="form-control form-control-sm" name="address"
                                        id="address">
                                    <div class="form-control form-control-sm"id="searchResults"></div>
                                </div>
                                <script>
                                    // JavaScript code using jQuery
                                    $(document).ready(function() {
                                        var searchResults = $('#searchResults');

                                        // Function to display search results
                                        function displayResults(results) {
                                            searchResults.empty();
                                            if (results.length) {
                                                var ul = $('<ul class="list-group"></ul>');
                                                results.forEach(function(result) {
                                                    var li = $('<li class="list-group-item"></li>');
                                                    li.text(result.display_name);
                                                    li.on('click', function() {
                                                        $('#address').val(result.display_name);
                                                        searchResults.empty();
                                                    });
                                                    ul.append(li);
                                                });
                                                searchResults.append(ul);
                                            } else {
                                                searchResults.text('No results found');
                                            }
                                        }

                                        // Function to search for addresses
                                        function searchAddress(query) {
                                            $.getJSON('https://eu1.locationiq.com/v1/search.php', {
                                                    key: 'pk.090cef3b2b51b26584127bf098d454a6',
                                                    q: query,
                                                    format: 'json'
                                                })
                                                .done(function(data) {
                                                    var results = data.map(function(result) {
                                                        return {
                                                            display_name: result.display_name
                                                        };
                                                    });
                                                    displayResults(results);
                                                })
                                                .fail(function() {
                                                    searchResults.text('Error: Failed to search for addresses');
                                                });
                                        }

                                        // Function to debounce search input
                                        function debounce(func, delay) {
                                            var timeout;
                                            return function() {
                                                var context = this,
                                                    args = arguments;
                                                clearTimeout(timeout);
                                                timeout = setTimeout(function() {
                                                    func.apply(context, args);
                                                }, delay);
                                            };
                                        }

                                        // Bind keyup event to search input
                                        $('#address').on('keyup', debounce(function() {
                                            var query = $(this).val();
                                            searchAddress(query);
                                        }, 500));
                                    });
                                </script>



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
