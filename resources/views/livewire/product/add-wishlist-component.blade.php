<div class="w-100">
    @if (in_array($productId, $addedToWishlistIds))
        <span class="btn-product-icon  btn-wishlist btn-expandable"
            wire:click="removeFromWishlist({{ $productId }})"><span>remove
                from
                wishlist</span></span>
    @else
        <span class="btn-product-icon  btn-wishlist btn-expandable"
            wire:click="addToWishlist({{ $productId }})"><span>add
                to
                wishlist</span></span>
    @endif

    <script>
        setTimeout(() => {
            window.addEventListener('error', event => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Login required for add to wishist!',
                    footer: '<a href="{{ route('login') }}">do you want to login?</a>'
                })
            })
        }, 1000);
    </script>

</div>
