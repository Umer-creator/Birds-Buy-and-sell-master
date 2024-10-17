<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                {{ $distance }}
                <label for="" class="form-label">Name</label>
                <input wire:model="name" type="text" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input wire:model="email" type="email" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"> @error('email')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input wire:model="phone" type="text" name="" id="" class="form-control"
                    placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"> @error('email')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input wire:model="address" type="text" id="address" class="form-control" placeholder=""
                    autocomplete="off" aria-describedby="helpId" style="height: 100px;">
                <small id="helpId" class="text-success">Your address: {{ $address }}</small>
                <small id="helpId" class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                    @if ($address)
                        @if ($apiSuccess)
                            <p class="text-success">Valid Address</p>
                        @else
                            <p class="text-warning">I </p>
                        @endif
                    @endif
                </small>
                <div id="searchResults"></div>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" class="form-control" value="Done" wire:click="handleSubmit">
            </div>
        </div>
        <div class="col-8">
            <div class="summary">
                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                <table class="table table-summary">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Store</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Distance</th>
                            <th>Shipping Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total = 0;
                            $shipping_total = 0;
                        @endphp
                        @foreach ($cart_products as $cart_product)
                            <tr>
                                <td>{{ $cart_product->product->name }}</td>
                                <td>{{ $cart_product->product->store->name }}</td>
                                <td>{{ $cart_product->quantity }}</td>
                                <td>{{ $cart_product->quantity * $cart_product->product->price }}</td>
                                <td>{{ $cart_product->distance }} km</td>
                                <td>{{ $cart_product->shipping_cost }}</td>

                                @php
                                    $total += $cart_product->quantity * $cart_product->product->price;
                                    $shipping_total += $cart_product->shipping_cost;
                                @endphp

                            </tr>
                        @endforeach
                        @if ($apiSuccess)
                            <tr class="summary-subtotal">
                                <td>Address</td>
                                <td>{{ $address }}</td>
                            </tr><!-- End .summary-subtotal -->
                        @endif
                        <tr class="summary-subtotal">
                            <td>Subtotal:</td>
                            <td>{{ $total }}</td>
                        </tr><!-- End .summary-subtotal -->

                        <tr class="summary-total">
                            <td>Shipping total</td>
                            <td>{{ $shipping_total }}</td>
                        </tr><!-- End .summary-total -->

                        <tr class="summary-total">
                            <td>Grand total</td>
                            <td>{{ $shipping_total + $total }}</td>
                        </tr><!-- End .summary-total -->

                    </tbody>
                </table><!-- End .table table-summary -->

                <div class="accordion-summary" id="accordion-payment">
                    <div class="card">
                        <div class="card-header" id="heading-5">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5"
                                    aria-expanded="false" aria-controls="collapse-5">
                                    Shipping Payments Calculations
                                    {{-- <img src="{{ asset('assets/assets/images/payments-summary.png') }}             "
                                                            alt="payments cards"> --}}
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                            data-parent="#accordion-payment">
                            <div class="card-body"> Shipping payments caclulation on the basics of Distance per km from
                                your location to stores location
                                and per km charges are <b>
                                    <p class="text-success"> Rs :{{ env('SHIPPING_PER_KM_RATE') }}</p>
                                </b>
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->
                </div><!-- End .accordion -->

                @if ($apiSuccess)
                    <form action="order-payment" method="POST">
                        @csrf
                        <button class="btn btn-outline-primary-2 btn-order btn-block">
                            <span class="btn-text">Place Order</span>
                            <span class="btn-hover-text">Pay and Proceed</span>
                        </button>
                    </form>
                @endif
            </div><!-- End .summary -->
        </div>
    </div>
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
                        Livewire.emit('updateAddress', result.display_name);
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
