<!-- Include jQuery library -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
            <div class="row">
                <div class="col-sm-6">
                    <label> Name *{{ $name }}</label>
                    <input name="name" wire:model="name" type="text" class="form-control" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div><!-- End .col-sm-6 -->
                <div class="col-sm-6">
                    <label>Email address *</label>
                    <input type="email" wire:model="email" class="form-control" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- End .row -->

            <div class="row">
                <div class="col-sm-8">
                    <label>Phone *</label>
                    <input type="tel" wire:model="phone" class="form-control" required>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div><!-- End .col-sm-6 -->
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label>Address *</label>
                    <input wire:model="address" type="text" name="address" id="address" class="form-control"
                        placeholder="Street name" required autocomplete="no">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div id="searchResults"></div>
                </div><!-- End .col-sm-6 -->
            </div><!-- End .row -->
        </div><!-- End .col-lg-9 -->

        <aside class="col-lg-6">
            <div class="summary">
                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                <table class="table table-summary">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Store</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_products as $cart_product)
                            <tr>
                                <td>{{ $cart_product->product->name }}</td>
                                <td>{{ $cart_product->product->store->name }}</td>
                                <td>{{ $cart_product->quantity }}</td>
                                <td>{{ $cart_product->quantity * $cart_product->product->price }}</td>
                                @php
                                    $total += $cart_product->quantity * $cart_product->product->price;
                                @endphp
                            </tr>
                        @endforeach

                        <tr class="summary-subtotal">
                            <td>Subtotal:</td>
                            <td>{{ $total }}</td>
                        </tr><!-- End .summary-subtotal -->

                        <tr class="summary-total">
                            <td>Total:</td>
                            <td>504.00</td>
                        </tr><!-- End .summary-total -->
                    </tbody>
                </table><!-- End .table table-summary -->

                <div class="accordion-summary" id="accordion-payment">
                    <div class="card">
                        <div class="card-header" id="heading-5">
                            <h2 class="card-title">
                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5"
                                    aria-expanded="false" aria-controls="collapse-5">
                                    Credit Card (Stripe)
                                    {{-- <img src="{{ asset('assets/assets/images/payments-summary.png') }}             "
                                                            alt="payments cards"> --}}
                                </a>
                            </h2>
                        </div><!-- End .card-header -->
                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                            data-parent="#accordion-payment">
                            <div class="card-body"> Donec nec justo eget felis facilisis
                                fermentum.Lorem
                                ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                volutpat mattis eros. Lorem ipsum dolor sit ame.
                            </div><!-- End .card-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .card -->
                </div><!-- End .accordion -->

                <button wire:click.prevent="placeOrder" class="btn btn-outline-primary-2 btn-order btn-block">
                    <span class="btn-text">Place Order</span>
                    <span class="btn-hover-text">Proceed to Checkout</span>
                </button>
            </div><!-- End .summary -->
        </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->

</div><!-- End .container -->

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
