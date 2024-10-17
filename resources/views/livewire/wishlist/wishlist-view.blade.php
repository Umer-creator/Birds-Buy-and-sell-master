<div class="container">
    <table class="table table-wishlist table-mobile">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Stock Status</th>
                <th></th>
                <th> </th>
            </tr>
        </thead>

        <tbody>
            @if ($wishlists->count() || $outOfStockProducts->count())
                @foreach ($wishlists as $wishlist)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset($wishlist->product->image) }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">{{ $wishlist->product->name }}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">{{ $wishlist->product->price }}</td>


                        <td wire:click="removeProduct({{ $wishlist->id }})" class="action-col">
                            <livewire:product.add-cart-component :productId="$wishlist->product->id" :wire:key="$wishlist->id" />
                        </td>
                        <td class="remove-col">
                            <button wire:click="removeProduct({{ $wishlist->id }})" class="btn-remove">
                                <i class="icon-close"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                @foreach ($outOfStockProducts as $outOfStockProduct)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset($wishlist->product->image) }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">{{ $wishlist->product->name }}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">{{ $wishlist->product->price }}</td>
                        <td class="stock-col"><span class="in-stock">Out of Stock</span></td>
                        <td class="action-col">
                            <button disabled class="btn btn-block btn-outline-primary-2"><i
                                    class="icon-cart-plus"></i>Out of stockt</button>
                        </td>
                        <td class="remove-col">
                            <button wire:click="removeProduct({{ $outOfStockProduct->id }})" class="btn-remove">
                                <i class="icon-close"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="d-flex flex-column align-items-center">
                    <span class="">
                        <p class="text-primary font-weight-bold cursor-pointer text-danger">
                            Wishlist is Empty
                        </p>
                    </span>
                    <span>
                        <p class="text-danger">Visit Products page and add products in wishlist </p>
                    </span>
                </div>
            @endif

        </tbody>
    </table><!-- End .table table-wishlist -->

    {{-- Start  Social icons --}}
    <section>
        <div class="wishlist-share">
            <div class="social-icons social-icons-sm mb-2">
                <label class="social-label">Share on:</label>
                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                        class="icon-pinterest"></i></a>
            </div><!-- End .soial-icons -->
        </div><!-- End .wishlist-share -->
    </section>
    {{-- End  Social icons --}}



</div><!-- End .container -->
