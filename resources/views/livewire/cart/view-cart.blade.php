  <div class="container">


      <div class="row">
          {{-- Start of cart items --}}
          <div class="col-lg-9 ">
              <table class="table table-cart table-mobile product_data">

                  {{-- Cart iteam  --}}
                  @if ($carts->count() || $outOfStockProducts->count())
                      <thead>
                          <tr>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th></th>
                          </tr>
                      </thead>

                      <tbody>

                          @foreach ($carts as $cart)
                              <tr>
                                  <td class="product-col">
                                      <div class="product">
                                          <figure class="product-media"><a href="#"> <img
                                                      src=" {{ asset($cart->product->image) }}" alt="image">
                                              </a>
                                          </figure>

                                          <h3 class="product-title">
                                              <a href="#">{{ $cart->product->name }}</a>
                                          </h3><!-- End .product-title -->
                                      </div><!-- End .product -->
                                  </td>
                                  <td class="price-col">Rs: {{ $cart->product->price }}</td>
                                  <td>


                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <button style="min-width: 26px" class="btn btn-increment btn-spinner"
                                                  type="button">
                                                  <p id="decrement" wire:click="decrement({{ $cart->product_id }})">-
                                                  </p>
                                              </button>
                                          </div>
                                          <span class="input-group-text w-30">{{ $cart->quantity }}</span>
                                          <div class="input-group-append">
                                              <button id="increment" style="min-width: 26px"
                                                  class="btn btn-decrement btn-spinner" type="button">
                                                  <p wire:click="increment({{ $cart->product_id }})">+
                                                  </p>
                                              </button>
                                          </div>
                                      </div>

                                  </td>
                                  <td class="total-col">Rs: {{ $cart->product->price * $cart->quantity }}</td>

                                  <td class="remove-col">
                                      <button wire:click="removeProduct({{ $cart->id }})" class="btn-remove">
                                          <i class="icon-close"></i>
                                      </button>
                                  </td>
                              </tr>
                          @endforeach

                          @foreach ($outOfStockProducts as $outOfStockProduct)
                              <tr>
                                  <td class="product-col">
                                      <div class="product">
                                          <figure class="product-media"><a href="#"> <img
                                                      src=" {{ asset($outOfStockProduct->product->image) }}"
                                                      alt="image">
                                              </a>
                                          </figure>

                                          <h3 class="product-title">
                                              <a href="#">{{ $outOfStockProduct->product->name }}</a>
                                          </h3><!-- End .product-title -->
                                      </div><!-- End .product -->
                                  </td>
                                  <td class="price-col">Rs: {{ $outOfStockProduct->product->price }}</td>
                                  <td>

                                      <div class="input-group">

                                          <span class="input-group-text w-30">{{ $outOfStockProduct->quantity }}</span>
                                      </div>

                                  </td>
                                  <td class="total-col">Out of Stock</td>

                                  <td class="remove-col">
                                      <button wire:click="removeProduct({{ $outOfStockProduct->id }})"
                                          class="btn-remove">
                                          <i class="icon-close"></i>
                                      </button>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  @else
                      <div class="d-flex flex-column align-items-center">
                          <span class="">
                              <p class="text-primary font-weight-bold cursor-pointer text-danger">
                                  Cart is Empty
                              </p>
                          </span>
                          <span>
                              <p class="text-danger">Visit Products page and add products e in cart </p>
                          </span>
                      </div>

                  @endif


                  {{-- Cart iteam  --}}


              </table><!-- End .table table-wishlist -->

          </div>
          {{-- End of cart items --}}

          {{-- Start checkout --}}
          <aside class="col-lg-3">
              <div class="summary summary-cart">
                  <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                  <table class="table table-summary">
                      <tbody>
                          <tr class="summary-subtotal">
                              <td>Subtotal:</td>
                              <td>Rs: {{ $total_price }}</td>
                          </tr><!-- End .summary-subtotal -->
                          <tr class="summary-total">
                              <td>Total:</td>
                              <td>Rs: {{ $total_price }}</td>
                          </tr><!-- End .summary-total -->
                      </tbody>
                  </table><!-- End .table table-summary -->

                  @if ($carts->count())
                      <a href="{{ route('checkout.view') }}"
                          class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                          CHECKOUT</a>
                  @endif



              </div><!-- End .summary -->

              <a href="{{ route('frontend.view-products') }}"
                  class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                      SHOPPING</span><i class="icon-refresh"></i></a>
          </aside>
          {{-- End  checkout --}}

      </div><!-- End .row -->
  </div><!-- End .container -->
  <script>
      window.addEventListener('cart_item_delete', event => {
          Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Product deleted from Cart successfully',
              showConfirmButton: false,
              timer: 1000
          })
      })
  </script>
