<?php

namespace App\Http\Livewire\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddWishlistComponent extends Component
{
    public $productId;
    public $addedToWishlistIds = [];

    public function mount($productId)
    {
        $this->productId = $productId;

        // Check if the product is already in the wishlist
        $this->addedToWishlistIds = array_column(Wishlist::where('user_id', Auth::id())->get()->toArray(), 'product_id');
    }
    public function addToWishlist($productId)
    {
        if (Auth::check() && Auth::user()->utype === 'user') {
            // Add the product to the cart
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $productId
            ]);

            // Add the product ID to the list of added to cart IDs
            $this->addedToWishlistIds[] = $productId;
            $this->emit('productAddedToWishlist');
            $this->dispatchBrowserEvent('wishlistAdded');
        } else {
            // Show an error message
            $this->dispatchBrowserEvent('error', 'Please log in to add products to the wishlist');
        }
    }

    public function removeFromWishlist($productId)
    {
        // Remove the product from the cart
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        // Remove the product ID from the list of added to cart IDs
        $this->addedToWishlistIds = array_diff($this->addedToWishlistIds, [$productId]);
        $this->dispatchBrowserEvent('wishlistDeleted');
        $this->emit('productRemovedFromWishlist');
    }


    public function render()
    {
        return view('livewire.product.add-wishlist-component');
    }
}
