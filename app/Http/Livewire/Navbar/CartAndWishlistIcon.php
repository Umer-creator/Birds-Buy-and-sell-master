<?php

namespace App\Http\Livewire\Navbar;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class CartAndWishlistIcon extends Component
{
    public $cartCount = 0;
    public $wishlistCount = 0;



    public function render()
    {
        $this->cartCount = Cart::where('user_id', Auth::id())->count();
        $this->wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return view('livewire.navbar.cart-and-wishlist-icon');
    }
}
