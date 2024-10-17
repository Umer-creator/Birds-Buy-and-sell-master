 <div class="wishlist">
     <a href="{{ url('wishlist') }}" title="Wishlist">
         <div class="icon">
             <i class="icon-heart-o"></i>
             <span class="wishlist-count badge">{{ $wishlistCount }}</span>
         </div>
         <p>Wishlist</p>
     </a>
 </div>


 <div class="wishlist">
     <a href="{{ route('cart.view') }}" title="Wishlist">
         <div class="icon">
             <i class="icon-shopping-cart"></i>
             <span id="countCart"class="wishlist-count badge">{{ $cartCount }}</span>
             <p id="ok"></p>
         </div>
         <p>Cart</p>
     </a>
 </div>
