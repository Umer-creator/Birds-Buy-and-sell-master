<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AddCartComponent extends Component
{
    public $productId;
    public $addedToCartIds = [];

    public function mount($productId)
    {
        $this->productId = $productId;

        // Check if the product is already in the cart
        $this->addedToCartIds = array_column(Cart::where('user_id', Auth::id())->get()->toArray(), 'product_id');
    }

    public function addToCart($productId)
    {
        if (Auth::check() && Auth::user()->utype === 'user') {
            // Add the product to the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId
            ]);

            // Add the product ID to the list of added to cart IDs
            $this->addedToCartIds[] = $productId;
            $this->emit('productAddedToCart');
            $this->dispatchBrowserEvent('cartAdded');
        } else {
            // Show an error message
            $this->dispatchBrowserEvent('error', 'Please log in to add products to the cart');
        }
    }

    public function removeFromCart($productId)
    {
        // Remove the product from the cart
        Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        // Remove the product ID from the list of added to cart IDs
        $this->addedToCartIds = array_diff($this->addedToCartIds, [$productId]);
        $this->dispatchBrowserEvent('cartDeleted');
        $this->emit('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.product.add-cart-component');
    }
}



























/*
namespace App\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddCartComponent extends Component
{

    public $productId;


    public function mount($productId)
    {
        $this->productId = $productId;
    }
    public function addToCart($productId)
    {
        if (Auth::check()) {
            if (Auth::user()->utype === 'user') {
                $pro_id = $productId;
                //perform logic here
                return   response()->json(['status' => 'livewire power added to cart: ' . $pro_id]);
            } else {
                return  response()->json(['status' => 'login first: ']);
            }
        } else {
            return  response()->json(['status' => 'login first: ']);
        }
    }

    public function render()
    {
        return view('livewire.product.add-cart-component');
    }
}
*/