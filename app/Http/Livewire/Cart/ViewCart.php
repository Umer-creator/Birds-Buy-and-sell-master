<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewCart extends Component
{
    public $carts;
    public $total_price;
    public $outOfStockProducts;

    public function mount()
    {
        //  $this->carts = Cart::where('user_id', Auth::id())->get();
        //fetch products which are avaliabke in stock
        $this->carts = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();
        //fetch products which are  not avaliabke in stock
        $this->outOfStockProducts = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '<', 1);
            })
            ->get();
    }

    public function increment($product_id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($cart) {
            $product = Product::find($product_id);

            if ($cart->quantity < $product->quantity) {
                $cart->quantity++;
                $cart->update();
            }
        }
    }

    public function decrement($product_id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product_id)
            ->first();

        if ($cart && $cart->quantity > 1) {
            $cart->quantity--;
            $cart->update();
        }
    }

    public function removeProduct($cartId)

    {
        $cart = Cart::find($cartId);
        if ($cart->delete()) {
            $this->dispatchBrowserEvent('cart_item_delete');
        }
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->carts as $cart) {
            $product = Product::find($cart->product_id);
            $total += $product->price * $cart->quantity;
        }
        $this->total_price = $total;
    }


    public function render()
    {

        //$this->carts = Cart::where('user_id', Auth::id())->get();
        //fetch products which are   avaliable in stock
        $this->carts = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();
        //fetch products which are  not avaliable in stock
        $this->outOfStockProducts = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '<', 1);
            })
            ->get();
        $this->getTotalPrice();
        return view('livewire.cart.view-cart');
    }
}
