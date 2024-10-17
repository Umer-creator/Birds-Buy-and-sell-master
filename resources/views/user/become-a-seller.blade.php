@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <script>
                        Swal.fire({
                            position: 'bottom',
                            icon: 'success',
                            title: 'Deleted successfully',
                            showConfirmButton: false,
                            timer: 700
                        })
                    </script> --}}
                    @if (Auth::user()->store)
                        <p>You Application for become a seller is submited</p>
                    @else
                        <h4 class="card-title">Create Store</h4>
                        <form class="cmxform" method="post" action="{{ route('user.become-a-seller') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label for="name">Name</label>
                                        <input id="name" value="{{ old('name', $model->name ?? '') }}"
                                            class="form-control form-control-sm" name="name" type="text">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="slug">Slug</label>
                                        <input id="slug" value="{{ old('slug', $model->slug ?? '') }}"
                                            class="form-control form-control-sm" name="slug" type="text">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Phone</label>
                                        <input id="phone" value="{{ old('phone', $model->phone ?? '') }}"
                                            class="form-control form-control-sm" name="phone" type="text">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Email</label>
                                        <input id="email" value="{{ old('email', $model->email ?? '') }}"
                                            class="form-control form-control-sm" name="email" type="email">
                                    </div>

                                    <div class="col-sm-8 mt-1">
                                        <label for="">Stripe Secret Key</label>
                                        <input id="stripeSecretKey"
                                            value="{{ old('stripeSecretKey', $model->stripeSecretKey ?? '') }}"
                                            class="form-control form-control-sm" name="stripeSecretKey" type="text">
                                        <small id="helpId" class="text-muted">you can get your stripe secret key from
                                            your
                                            Stripe Account

                                            Note please enter correct key all payments sends to this account</small>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control form-control-sm" name="description">{{ old('description', $model->description ?? '') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <input type="file" id="image" name="image" class="file-upload-default"
                                        value="">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control  form-control-sm file-upload-info"
                                            disabled=""
                                            placeholder="{{ old('image', $model->image ?? 'Upload Store Image') }}"
                                            value="{{ old('image', $model->image ?? '') }}">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="city">City</label>
                                        <input id="city" value="{{ old('city') }}"
                                            class="form-control form-control-sm" name="city" type="text">
                                    </div>


                                    <div class="col-sm-8">
                                        <label>Address</label>
                                        <input value="{{ old('address') }}" class="form-control form-control-sm"
                                            name="address" id="address" autocomplete="off">
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
                                                $.ajax({
                                                    url: '/api/location-iq-key',
                                                    method: 'GET'
                                                }).done(function(apiKey) {
                                                    $.getJSON('https://eu1.locationiq.com/v1/search.php', {
                                                            key: apiKey,
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
