{{-- <div class="w-100">
    <span class="btn-product btn-cart btn" wire:click="addToCart({{ $productId }})">
        <span>add to cart {{ $productId }}</span>
    </span>
</div> --}}

<div class="w-100">
    @if (in_array($productId, $addedToCartIds))
        <span id="removeFromCart{{ $productId }}" class="btn-product btn-cart btn"
            wire:click="removeFromCart({{ $productId }})">
            <span>Remove from cart</span>
        </span>
    @else
        <span id="addToCart" class="btn-product btn-cart btn" wire:click="addToCart({{ $productId }})">
            <span>Add to cart</span>
        </span>
    @endif

    <script>
        setTimeout(() => {
            window.addEventListener('error', event => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Login required for add to cart!',
                    footer: '<a href="{{ route('login') }}">do you want to login?</a>'
                })
            })
        }, 1000);


        window.addEventListener('cartAdded', event => {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Product added in Cart successfully',
                showConfirmButton: false,
                timer: 700
            })
        })

        window.addEventListener('cartDeleted', event => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Product removed from cart successfully',
                showConfirmButton: false,
                timer: 700
            })
        })
    </script>

</div>
