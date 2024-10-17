<?php

namespace App\Http\Livewire\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistView extends Component
{

    public $wishlists;
    public $outOfStockProducts;

    public function removeProduct($cartId)
    {
        $cart = Wishlist::find($cartId);
        if ($cart->delete()) {
            $this->dispatchBrowserEvent('cart_item_delete');
        }
    }

    public function render()
    {
        $this->wishlists = Wishlist::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();
        $this->outOfStockProducts = Wishlist::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '<', 1);
            })
            ->get();
        return view('livewire.wishlist.wishlist-view');
    }
}
